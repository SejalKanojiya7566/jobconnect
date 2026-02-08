@extends('layouts.admin')

@section('content')

<h2 class="page-title">Contact Messages</h2>

<!-- SEARCH BAR -->
<form method="GET" action="{{ route('admin.contacts') }}" class="contact-search">
    <input 
        type="text" 
        name="search" 
        placeholder="Search by name, email or message..."
        value="{{ request('search') }}"
    >
    <button type="submit">Search</button>
</form>

<table class="admin-table contact-table">
    <thead>
        <tr>
            <th width="140">Name</th>
            <th width="220">Email</th>
            <th>Message</th>
            <th width="130">Date</th>
            <th width="160">Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse($contacts as $c)
        <tr>
            <td>
                <strong>{{ $c->name }}</strong>
            </td>

            <td>
                <a href="mailto:{{ $c->email }}" class="email-link">
                    {{ $c->email }}
                </a>
            </td>

            <td class="message-cell">
                {{ $c->message }}
            </td>

            <td>
                {{ $c->created_at->format('d M Y') }}
            </td>

            <td class="action-cell">
                <!-- REPLY -->
                <a 
                    href="mailto:{{ $c->email }}?subject=Reply from JobConnect&body=Hi {{ $c->name }},%0D%0A%0D%0AThank you for contacting JobConnect.%0D%0A"
                    class="btn-sm reply-btn">
                    Reply
                </a>

                <!-- DELETE -->
                <a 
                    href="{{ route('admin.contacts.delete', $c->id) }}"
                    class="btn-sm delete-btn"
                    onclick="return confirm('Delete this message?')">
                    Delete
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="empty-row">
                No contact messages found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection