<?php

namespace App\Console\Commands;

use App\Customer;
use Illuminate\Console\Command;

class AutoCompleteCommand extends Command
{

    protected $signature = 'export:autoComplete';


    protected $description = 'Command description';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $customers=json_encode(Customer::all()->pluck('name') , JSON_UNESCAPED_UNICODE );
        file_put_contents(public_path('cache/customer.json') , $customers);
    }

}
