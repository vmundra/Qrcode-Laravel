<div class="col-md-6">

        <!-- Product Name Field -->
        <div class="form-group">
            {!! Form::label('product_name', 'Product Name:') !!}
            <p>{{ $qrcode->product_name }}</p>
        </div>

        <!-- Amount Field -->
        <div class="form-group">
                {!! Form::label('amount', 'Amount:') !!}
                <p>$ {{ $qrcode->amount }}</p>
            </div>

         <!-- Product Url Field -->
         <div class="form-group">
            {!! Form::label('product_url', 'Product Url:') !!}
            <p><a href="{{ $qrcode->product_url }}" >{{ $qrcode->product_url }}</a></p>
        </div>





        @if(!Auth::guest() && ($qrcode->id == Auth::user()->id || Auth::user()->role_id <3))
         <!-- User Id Field -->
        <div class="form-group">
            {!! Form::label('id', 'Qrcode Id:') !!}
            <p>{{ $qrcode->id }}</p>
        </div>

         <!-- Website Field -->
         <div class="form-group">
            {!! Form::label('user_id', 'User Name:') !!}
            <p>{{ $qrcode->user['name'] }}</p>
        </div>

        <!-- Website Field -->
        <div class="form-group">
            {!! Form::label('website', 'Website:') !!}
            <p><a href="{{ $qrcode->website }}" >{{ $qrcode->website }}</a></p>
        </div>

        <!-- Company Name Field -->
        <div class="form-group">
            {!! Form::label('company_name', 'Company Name:') !!}
            <p>{{ $qrcode->company_name }}</p>
        </div>

 


        <!-- Callback Url Field -->
        <div class="form-group">
            {!! Form::label('callback_url', 'Callback Url:') !!}
            <p><a href="{{ $qrcode->callback_url }}" >{{ $qrcode->callback_url }}</a></p>
        </div>


      

        <!-- Status Field -->
        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            <p>
                @if($qrcode->status == 1)
                    Active
                @else
                    Inactive
                @endif
                    
        </div>

    
@endif
</div>


    <div class="col-md-6">
       <!-- Qrcode Path Field -->
       <div class="form-group">
            {!! Form::label('qrcode_path', 'Scan Qrcode:') !!}
            <p>
            <img src="{{ asset($qrcode->qrcode_path) }}" >
            </p>
        </div>
    </div>


<div class="col-md-12">
@if(!Auth::guest() && ($qrcode->id == Auth::user()->id || Auth::user()->role_id <3))
<h3 class="text-center text-default">Transactions done using this Qrcode:- </h3>
    @include('transactions.table')
@endif
</div>