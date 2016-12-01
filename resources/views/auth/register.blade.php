@extends('store.store')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div><h3>Seu endereço:</h3></div>

                        <div class="form-group{{ $errors->has('end_rua') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Rua</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_rua" value="{{ old('end_rua') }}">

                                @if ($errors->has('end_rua'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_rua') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_n') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Número</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_n" value="{{ old('end_n') }}">

                                @if ($errors->has('end_n'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_n') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_bairro') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Bairro</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_bairro" value="{{ old('end_bairro') }}">

                                @if ($errors->has('end_bairro'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_bairro') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_cep') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">CEP</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_cep" value="{{ old('end_cep') }}">

                                @if ($errors->has('end_cep'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_cep') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_cidade') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cidade</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="end_cidade" value="{{ old('end_cidade') }}">

                                @if ($errors->has('end_cidade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_cidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_estado') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <select name="end_estado" class="form-control">
                                    <option value="">Estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="AP">Amap&aacute;</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Cear&aacute;</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Esp&iacute;rito Santo</option>
                                    <option value="GO">Goi&aacute;s</option>
                                    <option value="MA">Maranh&atilde;o</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="PA">Par&aacute;</option>
                                    <option value="PB">Para&iacute;ba</option>
                                    <option value="PE">Penambuco</option>
                                    <option value="PI">Piau&iacute;</option>
                                    <option value="PR">Paran&aacute;</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RO">Rond&ocirc;nia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="SP">S&atilde;o Paulo</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            @if ($errors->has('end_estado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
