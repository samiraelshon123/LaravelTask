<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        <div>
            <h4 class="logo-text">{{ env('APP_NAME') }}</h4>
        </div>

    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route("home")}}">
                <div class="parent-icon"><i class="bx bx-home"></i></div>
                <div class="menu-title"> {{__("sidebar.dashboard")}}</div>
            </a>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">

                <div class="menu-title">{{__("sidebar.Categories")}}</div>
            </a>
            <ul>

                    <li> <a href="{{route("category.index")}}"><i class="bx bx-right-arrow-alt"></i>{{__("sidebar.Categories")}}</a>
                    </li>

            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">

                <div class="menu-title">{{__("sidebar.Products")}}</div>
            </a>
            <ul>

                    <li> <a href="{{route("product.index")}}"><i class="bx bx-right-arrow-alt"></i>{{__("sidebar.Products")}}</a>
                    </li>

            </ul>
        </li>




    </ul>
    <!--end navigation-->
</div>
