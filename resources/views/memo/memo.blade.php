<html>
    <head>
        <style type="text/css">
            .bodyBody {
                margin: 10px;
                font-size: 1.50em;
            }
            .divHeader {
                text-align: right;
                border: 1px solid;
            }
            .divReturnAddress {
                text-align: left;
                float: left;
            }
            .divSubject {
                clear: both;
                font-weight: bold;
                padding-top: 80px;
            }
            .divAdios {
                float: right;
                padding-top: 50px;
            }
        </style>
    </head>
    <body class="bodyBody">
        <div class="divReturnAddress">
            From : <b>{{DB::table('users')->where('id',$memo->created_by)->first(['name'])->name}}</b><br/>

            To : <b>{{DB::table('users')->where('id',$memo->user_id)->first(['name'])->name}}</b><br/>
            <br/>
              Date : <b>{{date('F d, F',strtotime($memo->created_at))}}</b>
        </div>
        <div class="divSubject">
            Subject :  {{$memo->subject}}
        </div>
        <div class="divContents">
            <p>
               Gooday {{DB::table('users')->where('id',$memo->user_id)->first(['name'])->name}},
            </p>
            <p>
              {{$memo->content}}
            </p>
        </div>

    </body>
</html>
