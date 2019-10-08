<div class="box-body">
    <div class="form-group">
        <label for="content" class="control-label required">Gallery name</label> 
    @if(!empty($galleries))
        <input class="form-control" placeholder="name" name="name" type="text" id="name" value="{{ $galleries->name}}">
    @else   
        <input class="form-control" placeholder="name" name="name" type="text" id="name" >
    @endif
    </div><!--form control-->

    <div class="form-group">
        <label for="content" class="control-label required">Gallery Category</label> 
        <select class="form-control custom-select" name="gallery_category" id="gallery_category" data-toggle="select2" required>
    
        @if(!empty($selectedgallerycat))
            @foreach($galleryCategories as $gallerycat)
                @if($gallerycat['id'] == $selectedgallerycat[0])
                    <option selected value="{{$gallerycat->id}}">{{$gallerycat->name}}</option>
                @else
                    <option value="{{$gallerycat->id}}">{{$gallerycat->name}}</option>
                @endif
            @endforeach
        @else
                    <option value="" >None</option>
                @foreach($galleryCategories as $gallerycat)
                    <option value="{{$gallerycat->id}}">{{$gallerycat->name}}</option>
                @endforeach
        @endif
        
        </select>

    </div>

    <div class="form-group">
            <label for="content" class="control-label required mr-3">Gallery Image</label> 
            <button type="button" class="btn btn-outline-info mb-2" > <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a></button>
            <input type="file" id="pro-image" name="image[]" style="display: none;" class="form-control" multiple>

        <div class="preview-images-zone">   

        @if(!empty($galleries))
        @php
            $allimage =   explode(",",$galleries->image);
        @endphp
            @foreach($allimage as $key =>  $image)
                @if($key != 0)
                    <div class="preview-image preview-show-1">
                        <div class="image-cancel" data-no="1">x</div>
                        <div class="image-zone"><img id="pro-img-1" src="{{ url('storage/img/gallery/' . $image) }}"></div>
                        <div class="tools-edit-image"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div>
                    </div>
                @endif
            @endforeach
        @endif
    
        </div>
    </div>

    <div class="form-group">
        <label>Year View</label>
        @if(!empty($galleries))
        <input id="datepicker" value="{{$galleries->year}}" onchange="yearformat(this.value)" onClick="yearformat(this.value)" name="year" type="text" class="form-control" data-provide="datepicker" data-date-min-view-mode="2">
        @else
        <input id="datepicker"  onchange="yearformat(this.value)" onClick="yearformat(this.value)" name="year" type="text" class="form-control" data-provide="datepicker" data-date-min-view-mode="2">
        @endif
    </div>

    



    

</div><!--box-body-->

@section("after-scripts")
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own

    function yearformat(){
        var start = new Date(document.getElementById('datepicker').value);
        var y = start.getFullYear();
        $("#datepicker").val(y);
        document.getElementById("datepicker").value = y;
    }


    $(document).ready(function() {
        document.getElementById('pro-image').addEventListener('change', readImage, false);
        
        test = $( ".preview-images-zone" ).sortable();
        console.log(test);
        $(document).on('click', '.image-cancel', function() {
            let no = $(this).data('no');
            $(".preview-image.preview-show-"+no).remove();
                });
    });



var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");
      

        for (let i = 0; i < files.length; i++) {
            var file = files[i];

            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
         
        }

        // $("#pro-image").val('');

    } else {
        console.log('Browser not support');
    }
}


    </script>
@endsection
