<div class="banner">
    <div class="shadow position-absolute w-100 h-100"></div>
    <h1 dir="ltr">!اهلا بيك ف عرب ميديسن </h1>
    <form action="{{route('home')}}" method="get" class="mt-5 position-relative ms-auto search-form">

        <button type="submit" class="position-absolute text-dark"
                style="background: transparent !important; border: 0 ; left: 5px ; top: 5px"><i
                class="fa fa-search"></i></button>
        <input type="text" name="search" value="{{request('search')}}" placeholder="عايز تبحث عن اي كورس ؟" class="form-control">
    </form>
</div>
