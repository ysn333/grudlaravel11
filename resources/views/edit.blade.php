<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>
<body>
    <div class=" grid place-items-center">
        <div class="container ">
            <div class="flex justify-between mb-5 pr-20 pl-20 mt-5">
                {{-- <h2 class="text-blue-500">Create</h2> --}}
                <img src="https://purepng.com/public/uploads/large/purepng.com-batman-logobatmansuperherocomicdc-comicscatwomen-1701528526422cief3.png" class="w-20 h-15" alt="" srcset="">
                <a  href="/" class="btn w-64 rounded-full btn">Back Home</a>
            </div>

            <form method="POST" class="w-100 p-5" action="{{route('update', $ourPost->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="grid place-items-center">
                    <div class="w-80">
                        <div class="label">
                            <span class="label-text">Name:</span>
                        </div>
                        <input type="text"  id="name" name="name" placeholder="Type here" class="input input-bordered w-full" value="{{$ourPost->name}}"/>
                        {{-- error --}}
                        @error('name')
                           <span class="text-error">{{ $message }}</span>


                        @enderror


                        <div class="label">
                            <span class="label-text">description:</span>
                        </div>

                        <input type="text" id="description" name="description" placeholder="Type here" class="input input-bordered w-full" value="{{$ourPost->description}}"/>

                        @error('description')

                         <span class="text-error">{{ $message }}</span>
                        @enderror

                        <div class="label">
                            <span class="label-text">image:</span>
                        </div>

                        <input type="file" id="image" name="image"  class="file-input file-input-bordered file-input-md w-full" />

                        @error('image')
                         <span class="text-error">{{ $message }}</span>

                        @enderror
                        <button class="btn w-full mt-5 w-80 btn-active btn-primary" >Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
