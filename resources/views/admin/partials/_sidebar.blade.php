<nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1 scrollbar-thin">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        <span>Dashboard</span>
    </a>

    <div class="pt-3 pb-1">
        <p class="px-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Management</p>
    </div>

    <a href="{{ route('admin.users.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
        <span>Users</span>
    </a>

    <a href="{{ route('admin.services.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        <span>Services</span>
    </a>

    <a href="{{ route('admin.programs.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.programs.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
        <span>Programs</span>
    </a>

    <a href="{{ route('admin.bookings.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.bookings.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <span>Bookings</span>
    </a>

    <a href="{{ route('admin.registrations.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.registrations.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        <span>Registrations</span>
    </a>

    <a href="{{ route('admin.payments.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.payments.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span>Payments</span>
    </a>

    <div class="pt-3 pb-1">
        <p class="px-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Content</p>
    </div>

    <a href="{{ route('admin.blog.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.blog.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
        <span>Blog Posts</span>
    </a>

    <a href="{{ route('admin.pages.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.pages.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        <span>CMS Pages</span>
    </a>

    <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.testimonials.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
        <span>Testimonials</span>
    </a>

    <a href="{{ route('admin.contacts.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.contacts.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        <span>Messages</span>
    </a>

    <div class="pt-3 pb-1">
        <p class="px-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Coaching & Community</p>
    </div>

    <a href="{{ route('admin.coaches.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.coaches.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        <span>Coaches</span>
    </a>

    <a href="{{ route('admin.live-sessions.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.live-sessions.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
        <span>Live Sessions</span>
    </a>

    <a href="{{ route('admin.faqs.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.faqs.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        <span>FAQs</span>
    </a>

    <a href="{{ route('admin.support.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.support.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
        <span>Support Tickets</span>
    </a>

    <div class="pt-3 pb-1">
        <p class="px-4 text-xs font-semibold uppercase tracking-wider text-gray-500">Marketing & Analytics</p>
    </div>

    <a href="{{ route('admin.subscribers.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.subscribers.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
        <span>Subscribers</span>
    </a>

    <a href="{{ route('admin.communication.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.communication.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        <span>Communication</span>
    </a>

    <a href="{{ route('admin.analytics.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.analytics.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        <span>Analytics</span>
    </a>

    <div class="pt-3 pb-1">
        <p class="px-4 text-xs font-semibold uppercase tracking-wider text-gray-500">System</p>
    </div>

    <a href="{{ route('admin.media.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.media.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <span>Media Library</span>
    </a>

    <a href="{{ route('admin.notifications.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.notifications.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        <span>Notifications</span>
        @php $notificationCount = \App\Models\AdminNotification::unread()->count(); @endphp
        @if($notificationCount > 0)
        <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $notificationCount }}</span>
        @endif
    </a>

    <a href="{{ route('admin.security.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.security.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
        <span>Security</span>
    </a>

    <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <span>Settings</span>
    </a>
</nav>
