<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



<table class="w-full text-sm text-left text-gray-500 ">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
    <tr>
        <th scope="col" class="py-3 px-6">
            User info
        </th>
        <th scope="col" class="py-3 px-6">
            Case
        </th>


        <th scope="col" class="py-3 px-6">
            Report status
        </th>

        <th scope="col" class="py-3 px-6">
            Report
        </th>

        <th scope="col" class="py-3 px6">Reported at</th>

        <th scope="col" class="py-3 px6">Last updated at</th>
    </tr>
    </thead>
    <tbody>
    @forelse($reports as $value)

        <tr class="bg-white border-b  hover:bg-gray-50 ">
            <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap ">
                <div class="pl-3">
                    <div class="text-base font-semibold">{{$value->cases->users->name}}</div>
                    <div class="font-normal text-gray-500">{{$value->cases->users->email}}</div>
                </div>
            </th>
            <td class="py-4 px-6">
                {{$value->cases->caseSummary}}
            </td>
            <td class="py-4 px-6">
                <div class="flex items-center">
                    <x-badge color="{{$value->reportStatus === 'Critical' ? 'red' : 'blue'}}" value="{{$value->reportStatus}}"></x-badge>
                </div>
            </td>

            <td class="py-4 px-6">
                <div class="flex items-center cursor-pointer flex-wrap">
                    <x-badge color="blue" value="{{$value->reportDescription}}"></x-badge>
                </div>
            </td>

            <td class="py-4 px-6">
                <div class="flex items-center">
                    <x-badge color="yellow" value="{{\Carbon\Carbon::make($value->created_at)->diffForHumans()}}"></x-badge>
                </div>
            </td>

            <td class="py-4 px-6">
                <div class="flex items-center">
                    <x-badge color="yellow" value="{{\Carbon\Carbon::make($value->updated_at)->diffForHumans()}}"></x-badge>
                </div>
            </td>

        </tr>
        <tr>
            <td colspan="6">
                Reported at: {{$value->created_at}}
            </td>
        </tr>
    @empty
        <tr class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap ">
            <td scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap " colspan="4">
                No cases yet
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

</body>
</html>
