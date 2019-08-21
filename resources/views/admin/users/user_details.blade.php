<?php
/**
 * Created by PhpStorm.
 * User: Hamayun Khan
 * Date: 8/7/2019
 * Time: 8:03 PM
 */

?>
<table class="table table-responsive">
    <tr><th>Name</th><th>Email</th><th>User Name</th><th>Country</th></tr>
    <tr><td>{{$user->first_name}} {{ $user->last_name }}</td><td>{{$user->email}}</td>
        <td>
            {{ $user->username }}
        </td><td>{{$user->country}}</td>
    </tr>
</table>

<h1>Role and permissions</h1>
<ul class="list-group-unbordered">
@foreach($user->roles as $role)
    <li>{{$role->name}}</li>
@endforeach
</ul>
