<form action="{{"search"}}" method="GET">
    @csrf
    <div class="input-group bg-white shadow-inset-2" style="border-radius: 50px;">

        <div class="input-group-prepend">
            <button type="submit" class="input-group-text bg-transparent border-right-0"
                    style="border-radius: 50px 0px 0px 50px">
                <i class="fal fa-search" ></i>
            </button>
        </div>
        <input type="text" class="form-control border-left-0 bg-transparent pl-0"
               placeholder="What are you looking for?"
               style="height: 50px;border-radius: 0px 50px 50px 0px;"
               name="search">

    </div>
</form>