<x-backend.master>
    <x-slot:title>
        Coupon List
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Coupon info</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('coupons.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button>
                </a>
            </div>
        </div>

        <x-forms.message />

        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Balance</th>
                    <th>Percentage</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->type == 0 ? 'Single Use' : 'Multi Use'}}</td>
                    <td>{{ $coupon->balance }}</td>
                    <td>{{ $coupon->percentage }}%</td>
                    <td class="d-flex">
                       
                         <a class="btn btn-sm btn-outline-info mx-2" href="{{ route('coupons.show', $coupon->id) }}">Show</a>
                        <a class="btn btn-sm btn-outline-warning" href="{{ route('coupons.edit', $coupon->id) }}">Edit</a>

                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger mx-2" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</x-backend.master>