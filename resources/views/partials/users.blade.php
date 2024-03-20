@foreach ($users as $user)
    <tr>
        <td>
            <a href={{ sprintf("/user/%s",
                    $user->pubkey) }}
            class="link-secondary">
                {{ sprintf("%32.32s ...",
                    $user->pubkey) }}
            </a>
        </td>
        <td>
        {{ sprintf("%32.32s",
            $user->email) }}
        </td>
        <td>
        {{ $user->balance }}
        </td>
        <td>
        {{ $user->created_at }}
        </td>
    </tr>
@endforeach