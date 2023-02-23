<div class="modal fade customer-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">
            @if ($resource->id)
                Edit Customer
            @else
            Create Customer
            @endif
        </h5>
        <a href="{{ route('customer.index') }}" class="btn">X</a>
        </div>
        <form action="{{$resource->id ?  route('customer.update' , $resource->id) : route('customer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="row">


                <div class="col-12 pt-4">
                    <div class="form-group">
                        <label for=""><b>Name :</b></label>
                        <input type="text" class="form-control " name="name" required placeholder="Name" value="{{old('name', $resource->name )}}">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Email :</b></label>
                        <input type="email" class="form-control " name="email" required placeholder="Email" value="{{ old('email',$resource->email) }}">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Address :</b></label>
                        <input type="text" class="form-control " name="address" required placeholder="Address" value="{{ old('address',$resource->address)}}">
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
