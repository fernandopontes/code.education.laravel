<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;

use CodeCommerce\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $products = $this->productModel->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();

        $product = $this->productModel->fill($input);

        $product->save();

        $this->productModel->attachProductTag($input['tags'], $product);

        return redirect('admin/products');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);
        $tags = $product->tags;

        return view('products.edit', compact('product', 'categories', 'tags'));
    }

    public function update(ProductRequest $request, $id)
    {
        $input = $request->all();
        $this->productModel->attachProductTag($input['tags'], $this->productModel->find($id), TRUE);

        $this->productModel->find($id)->update($input);

        return redirect('admin/products');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();

        return redirect('admin/products');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id' => $id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path() . '/uploads/' . $image->id . '.' . $image->extension))
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id' => $product->id]);
    }
}
