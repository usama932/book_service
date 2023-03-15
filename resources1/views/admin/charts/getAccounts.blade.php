@foreach($accounts as $account)
    {!! '<option value="'.$account->id.'">'.$account->account_no.'</option>' !!}
@endforeach
