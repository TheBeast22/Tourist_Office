
<ol>
                    @foreach ($companys as $company)
                        <li>This product is {{ ucwords($company->name) }}
                            <form action="/company/delete/{{ ucwords($company->id) }} " method="post">
                                 @csrf
                                <input type="hidden" name="_method" value="DELETE" >
                                <input type="submit" value="delete " >
                            </form>
                        </li>
                    @endforeach
                </ol>

