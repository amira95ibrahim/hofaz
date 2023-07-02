<li class="header">القائمة الرئيسية</li>
<li class='active'>
    <a class="nav-link {{ Request::is('admin/home*') ? 'active' : '' }}"
        href="{{ route('admin.home') }}">
        <i class="fa fa-dashboard"></i> <span>الرئيسية</span>
    </a>
</li>

<li class="">
    <a class="nav-link {{ Request::is('admin/countries*') ? 'active' : '' }}"
        href="{{ route('admin.countries.index') }}">
        <i class="fa fa-globe"></i> <span>الدول</span>
    </a>
</li>
<!---------------------- sadaqat -------------------->

<li class='treeview '>
    <a href="#">
    <i class="fa fa-smile-o" aria-hidden="true"></i>  <span>صدقة</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a class="nav-link {{ Request::is('admin/sadaqat*') ? 'active' : '' }}"
                href="{{ route('admin.sadaqat.index') }}">
                <i class="fa fa-list"></i> اوجه الصدقات</a>
            </a>
        </li>
        <li>
         <a class="nav-link {{ Request::is('admin/sadaqat*') ? 'active' : '' }}"
            href="{{ route('admin.sadaqahPage.edit') }}">

            <i class="fa fa-edit" aria-hidden="true"></i> وصف الصدقة
        </a>

        </li>
    </ul>

</li>


<!---------------------- categories -------------------->

<li class='treeview '>
    <a href="#">
    <i class="fa fa-smile-o" aria-hidden="true"></i>  <span>الاقسام</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}"
                href="{{ route('admin.categories.index') }}">
                <i class="fa fa-list"></i>  الاقسام</a>
            </a>
        </li>
        <li>
         {{-- <a class="nav-link {{ Request::is('admin/sadaqat*') ? 'active' : '' }}"
            href="{{ route('admin.sadaqahPage.edit') }}">

            <i class="fa fa-edit" aria-hidden="true"></i> وصف الصدقة
        </a> --}}

        </li>
    </ul>

</li>

<!---------------------- zakah -------------------->


<li class='treeview '>
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="fa fa-money"></i>  <span>ذكاة</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a class="nav-link" href="{{ route('admin.zakat.index') }}">
                <i class="fa fa-list"></i> اوجه الذكاه
            </a>
        </li>
        <li>

            <a class="nav-link" href="{{ route('admin.zakahPage.edit') }}">
                <i class="fa fa-sticky-note-o" aria-hidden="true"></i> وصف الذكاة
            </a>

        </li>
    </ul>

</li>


<!---------------------- kafala -------------------->
<li class='treeview '>
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="fa fa-user"></i>  <span>كفالة</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span>
    </a>
    <ul class="treeview-menu">
    <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kafalat.index') }}">
            <i class="fa fa-user"></i> كفالة</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kafalaTypes.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i> انواع الكفالة</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kafalaFields.index') }}">
            <i class="fa fa-sticky-note-o" aria-hidden="true"></i> حقول الكفالة</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kafalahPage.edit') }}">
                <i class="fa fa-edit"></i> وصف الكفالة</a>
        </li>
    </ul>

</li>
<!---------------------- Project -------------------->


<li class='treeview '>
    <a href="{{ route('admin.projects.index') }}">
        <i class="fa fa-th"></i>
                <span>المشاريع</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a href="{{ route('admin.projects.index') }}">
            <i class="fa fa-circle-o"></i>عرض المشاريع
            </a></li>
        <li> <a href="{{ route('admin.projectsPage.edit') }}"><i class="fa fa-circle-o"></i>وصف المشاريع</a></li>
    </ul>

</li>

<!------------------------- waqf ---------------------------->

<li class='treeview '>
    <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="fa fa-wrench"></i>  <span>وقف</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span>
    </a>
    <ul class="treeview-menu">
        <li>
            <a class="nav-link" href="{{ route('admin.waqf.index') }}">
                <i class="fa fa-wrench"></i> وقف</a>
        </li>
        <li>

            <a class="nav-link" href="{{ route('admin.waqfPage.edit') }}">
                <i class="fa fa-edit"></i> وصف الوقف</a>

        </li>
    </ul>

</li>

<!------------------------- kafarah ---------------------------->

<li class='treeview '>
    <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="fa fa-smile-o" aria-hidden="true"></i>  <span>كفارة</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span>
    </a>
    <ul class="treeview-menu">
        <li>

        <a class="nav-link {{ Request::is('admin/kafarah*') ? 'active' : '' }}"
                href="{{ route('admin.kafarah.index') }}">

                <i class="fa fa-list"></i>  اوجه الكفارة</a>
        </li>
          <li>


        </li>
    </ul>

</li>

<!------------------------- relief ---------------------------->

<li class="treeview">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-wrench"></i> <span>إغاثة</span>
    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span>
    </a>
    <ul class="treeview-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reliefs.index') }}">
                <i class="fa fa-wrench"></i> إغاثة</a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reliefsPage.edit') }}">
                <i class="fa fa-edit"></i> وصف الإغاثة</a>
        </li>
    </ul>
</li>

<!------------------------- gifts ---------------------------->

<li class="nav-item">
    <a class="nav-link {{ Request::is('admin/gifts*') ? 'active' : '' }}"
       href="{{ route('admin.gifts.create') }}">
        <i class="fa fa-gift"></i>
        <span>هدية</span>

    </a>
</li>

{{--<li class="nav-item">--}}
{{--    <a class="nav-link {{ Request::is('admin/kafalaFields*') ? 'active' : '' }}"--}}
{{--        href="{{ route('admin.kafalaFields.index') }}">--}}
{{--        <i class="icon-user-follow"></i>--}}
{{--        @lang('models/kafalaFields.plural')--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--    <a class="nav-link {{ Request::is('admin/kafalat*') ? 'active' : '' }}"--}}
{{--        href="{{ route('admin.kafalat.index') }}">--}}
{{--        <i class="icon-user-follow"></i>--}}
{{--        @lang('models/kafalat.plural')--}}
{{--    </a>--}}
{{--</li>--}}
<!------------------------- relief ---------------------------->



<li class="nav-item">
    <a class="nav-link {{ Request::is('admin/publications*') ? 'active' : '' }}"
        href="{{ route('admin.publications.index') }}">
        <i class="fa fa-laptop"></i>
        <span>المكتبة الاعلامية</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('admin/news*') ? 'active' : '' }}"
        href="{{ route('admin.news.index') }}">
        <i class="fa fa-edit"></i>
        <span>الاخبار </span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('admin/achievements*') ? 'active' : '' }}"
        href="{{ route('admin.achievements.index') }}">
        <i class="fa fa-calendar"></i>
       <span> انجازات حفاظ </span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('admin/testimonials*') ? 'active' : '' }}"
        href="{{ route('admin.testimonials.index') }}">
        <i class="fa fa-calendar"></i>
        <span> قالوا عنا </span>
    </a>
</li>

<!--------------- subscribers ------------------------->
<li class="nav-item">
    <a class="nav-link {{ Request::is('admin/subscribers*') ? 'active' : '' }}"
        href="{{ route('admin.subscribers.index') }}">
        <i class="fa fa-folder"></i>
        <span> النشرة البريدية </span>
    </a>
</li>

<!--------------- Settings ------------------------->
<li class="nav-item">
    <a class="nav-link {{ Request::is('admin/navSections*') ? 'active' : '' }}"
        href="{{ route('admin.navSections.index') }}">
        <i class="fa fa-users"></i>
        اقسام الموقع
    </a>
</li>

<li class="header">الموقع</li>
<li class="">
    <a class="nav-link {{ Request::is('admin/settings*') ? 'active' : '' }}"
        href="{{ route('admin.settings.edit' , 1) }}">
        <i class="fa fa-circle-o text-yellow"></i> <span>الاعدادات</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('admin/homepageSliders*') ? 'active' : '' }}"
        href="{{ route('admin.homepageSliders.index') }}">
        <i class="fa fa-image"></i>
        <span>بنارات صفحة الموقع الرئيسية </span>
    </a>
</li>
<!-------------------------------------------->




