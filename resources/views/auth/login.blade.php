@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card 
                title="Inicio de sesíón"
            >
                
                @if($errors->any())
                    <b-alert show variant='danger'>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </b-alert>
                @else
                    <b-alert show>Porfavor ingrese sus datos</b-alert>
                @endif                
                <b-form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <b-form-group
                        label="Correo Electrónico:"
                        label-for="email"
                    >
                        <b-form-input
                            id="email"
                            type="email"
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus
                            placeholder="example@gmail.com"
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group
                        label="Contraseña:"
                        label-for="password"
                    >
                        <b-form-input
                            id="password"
                            type="password"
                            name="password"  
                            required 
                        ></b-form-input>
                    </b-form-group>
                    <b-form-group>
                        <b-form-checkbox
                            name="remember"
                            {{ old('remember') ? 'checked="true"' : '' }}
                        >
                            Recordar Sesión
                        </b-form-checkbox>
                    </b-form-group>

                    <b-button type="submit" variant="primary">Guardar</b-button>
                    <b-button variant="link">'Forgot Your Password?'</b-button>
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
