<x-backend.master>
    <x-slot:title>
        Contact Edit
        </x-slot>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Contact info Edit</h1>
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

    <form action="{{ route('coupons.update', $coupon->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
 
        <x-forms.input type="text" name="code" label="Voucher Code" :value="old('code', $coupon->code)" required placeholder="Enter Voucher Code" />
        
        <x-forms.select name="type" label="Voucher Type" :options="['single Use', 'Multi Use']" :selected="old('type', $coupon->type)" required/>

        <x-forms.input type="number" name="balance" label="Balance" :value="old('balance', $coupon->balance)" required placeholder="Enter coupon Balance" />
        
        <x-forms.input type="number" name="percentage" label="Percentage" :value="old('percentage', $coupon->percentage)" required placeholder="Enter percentage" />
               
        <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>

    </x-backend.master>