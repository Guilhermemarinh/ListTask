@if (count($errors) > 0)
    <!-- Form Error  -->
    <div class="alert alert-danger">
        <strong>ihh! Algo deu Errado!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
