<div class="flex items-center">
                            
    <div class="notification-container mr-8 hover:bg-gray-400 focus:outline-none">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>   
        </div>
        <div class="notification-badge"><b>{{$countnotification}}</b></div> <!-- Replace 42 with the actual number you want to display -->
      </div>
    <!-- User Image -->
    <img class="w-8 h-8 rounded-full" src="{{asset('images/users/'.Auth::user()->image)}}" alt="User Image">

<div>
    <div class="relative">
        <!-- Dropdown Toggle Button -->
        <button id="dropdownToggle"
            class="pr-4 py-2  text-gray-800 hover:bg-gray-400 focus:outline-none">
            <!-- User Name -->
            <span class="font-medium">{{ Auth::user()->name }}</span>
            <svg class="h-4 w-4 inline-block ml-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <!-- Dropdown Menu -->
        <ul id="dropdownMenu"
            class="absolute right-0 hidden mt-2 py-2 w-32 bg-white rounded-md shadow-lg z-10">
            <li>
                <a href="{{route('profile.edit')}}"
                    class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf            
            <li>
                <a href="{{route('logout')}}"class="block px-4 py-2 text-gray-800 hover:bg-gray-200" onclick="event.preventDefault();
                this.closest('form').submit();">Logout</a>
            </li>
        </form>
        </ul>
    </div>
</div>
</div>
</nav>

<!-- Main Content Here -->
<div class="flex-1 p-4">
@yield('content')
</div>
</div>

<!-- Notification Sidebar -->
<div id="notificationSidebar" class="notification-sidebar min-h-screen bg-white shadow-lg hidden">
<!-- Add content for the notification sidebar here -->
<!-- For example, you can show the list of notifications -->
<span id="notificationSidebarClose" class="text-grey-900 font-bold hover:bg-gray-400 focus:outline-none" style="margin-left: 97%">X</span>
<div class="flex flex-col ">
<h1 class="text-center text-grey-600 text-xl font-bold">Notifications</h1>
<div class="relative">
<!-- Your content goes here -->
<a href="{{route('adminnotifications.index')}}" class="float-right"><u>See all</u></a>
</div>
<ul class="mt-4">
    <?php $count = 0 ?>
    @foreach ($queuenotification as $qn)
    <a href="{{route('user.notification.redireact',$qn->id)}}">
        <li class="px-4 py-2">
            <div>
                <p style="color: #37517e; "><b>{{ $qn->created_at->format('h:i A') }}</b></p>
                <p style="font-weight: 400;">{{$qn->content}}</p>
            </div>
        </li>
    </a>
    <?php $count = $count + 1; ?>
    @endforeach
</ul>
@if ($count != 0)
<div class="flex justify-center mt-3">
    <a href="{{ route('user.notifications.markallasunread') }}" class="text-center text-black underline">Clear all</a>
</div>    
@endif



</div>
</div>