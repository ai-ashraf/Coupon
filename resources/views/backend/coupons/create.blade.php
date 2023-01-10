<x-backend.master>
    <x-slot:title>
        Coupon create
        </x-slot>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Create Coupon</h1>
        <div class="btn-toolbar mb-2 mb-md-0">     
            <a href="{{ route('coupons.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <x-forms.errors />

    <form action="{{ route('coupons.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-forms.input type="text" name="code" label="Voucher Code" :value="old('code')" required placeholder="Enter Voucher Code" />
        
        <x-forms.select name="type" label="Voucher Type" :options="['single Use', 'Multi Use']" :selected="old('type')" required/>

        <x-forms.input type="number" name="balance" label="Balance" :value="old('balance')" required placeholder="Enter coupon Balance" />
        
        <x-forms.input type="number" name="percentage" label="Percentage" :value="old('percentage')" required placeholder="Enter percentage" />
        
       
       
        <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>

    </x-backend.master>