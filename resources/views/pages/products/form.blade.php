<div class="modal fade product-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">
            @if ($resource->id)
                Edit Product
            @else
            Create Product
            @endif
        </h5>
        <a href="{{ route('product.index') }}" class="btn">X</a>
        </div>
        <form action="{{$resource->id ?  route('product.update' , $resource->id) : route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="row">


                <div class="col-12 pt-4">
                    <div class="form-group">
                        <label for=""><b>Title :</b></label>
                        <input type="text" class="form-control " name="title" required placeholder="title" value="{{old('title', $resource->title )}}">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Quantity :</b></label>
                        <input type="number" class="form-control " name="quantity" required placeholder="quantity" value="{{ old('quantity',$resource->quantity) }}">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Price :</b></label>
                        <input type="text" class="form-control " name="price" required placeholder="price" value="{{ old('price',$resource->price)}}">
                    </div>
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
        </div>
    </form>
    </div>
    </div>
</div>
