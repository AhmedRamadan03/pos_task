<div class="row">
    @foreach ($products as $item)
    @if ($item->quantity > 0)
    <div class="col-md-4">
        <a href=""
            id="product-{{ $item->id }}"
            data-name="{{ $item->title }}"
            data-id="{{ $item->id }}"
            data-price="{{ $item->price }}"
            class=" add-product-btn text-decoration-none">
            <div class="card text-">
                <div class="card-body p-2">
                    <b>{{ $item->title }}</b><br>
                    <b>Price :{{ $item->price }} EGy</b> <br>
                    <b> quantity :{{ $item->quantity }}  </b>
                </div>

            </div>
        </a>
    </div>        
    @endif
        
    @endforeach

</div>
