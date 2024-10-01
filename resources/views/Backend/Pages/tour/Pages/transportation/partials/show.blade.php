@extends('Backend.app')

@section('content')
    <div class="flex flex-col justify-between  gap-8">

        <div class="w-full h-full flex justify-between items-center">
            <div>

                <h1 class="text-2xl font-semibold text-slate-800">
                    {{ $tour->name }}
                </h1>
                <div class="flex gap-2">
                    <p>
                        @php
                            $diff = \Carbon\Carbon::parse($tour->start_date)->diff(
                                \Carbon\Carbon::parse($tour->end_date),
                            );
                            $parts = [];

                            if ($diff->y > 0) {
                                $parts[] = "{$diff->y} tahun";
                            }
                            if ($diff->m > 0) {
                                $parts[] = "{$diff->m} bulan";
                            }
                            if ($diff->d > 0) {
                                $parts[] = "{$diff->d} hari";
                            }

                            echo implode(', ', $parts);
                        @endphp
                    </p>
                    <p>
                        ( {{ date('j F Y', strtotime($tour->start_date)) }} -
                        {{ date('j F Y', strtotime($tour->end_date)) }} )
                    </p>
                </div>
            </div>

            <div>
                <p>Tourist: {{ $tour->user->name }}</p>
            </div>


        </div>
        <div>
            <a href="{{ route('tours.edit', $tour->id) }}" class="button-primary">Transportation</a>
        </div>
    </div>
@endsection
