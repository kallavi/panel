@extends('layout.admin.layout')
@section('pageTitle')
    Aktiviteler
@endsection
{{-- @section('rightContent')
    <x-admin.button :title="'Create New'" :class="'d-flex flex-center h-35px h-lg-40px '" :color="'success'" :iconTag="'i'" :iconType="'outline'" :iconName="'file-down'" :iconClass="'fs-1 me-1'" />
@endsection --}}
@section('app')
    <x-admin.wrapper-container>
        <x-slot:content>





            <x-admin.card :class="'card-xl-stretch mb-xl-8 border-0'" :cardHeaderClass="'align-items-center border-0 mt-4'" :cardBodyClass="'pt-5 bg-gray-300 bg-opacity-20 rounded'">
                <x-slot:cardBody>
                    @foreach ($q as $key => $date)
                        <x-admin.timeline-item :timelineHead="\Carbon\Carbon::parse($key)->format('d/m/Y')" />
                        <x-admin.timeline-item :parentClass="'mb-8'">
                            <x-slot:item>
                                @foreach ($date as $item)
                                    @if ($item->event == 'created')
                                        <x-admin.timeline-item :labelClass="'fw-bold text-gray-800 fs-6'" :time="\Carbon\Carbon::parse($item->created_at)->format('H:i')" :color="'success'" :text="$item->description" :textBold="'fw-bold text-gray-800'" />
                                    @elseif($item->event == 'deleted')
                                        <x-admin.timeline-item :labelClass="'fw-bold text-gray-800 fs-6'" :time="\Carbon\Carbon::parse($item->created_at)->format('H:i')" :color="'danger'" :textBold="'fw-bold text-gray-800'">
                                            <x-slot:text>
                                                {{$item->description}}
                                            </x-slot:text>
                                        </x-admin.timeline-item>
                                    @elseif($item->event == 'updated')
                                        <x-admin.timeline-item :labelClass="'fw-bold text-gray-800 fs-6'" :time="\Carbon\Carbon::parse($item->created_at)->format('H:i')" :color="'primary'" :text="$item->description" />
                                    @endif

                                    {{-- <x-admin.timeline-item
                                            :labelClass="'fw-bold text-gray-800 fs-6'"
                                            :time="'08:42'"
                                            :color="'warning'"
                                            :text="'Outlines keep you honest. And keep structure'" 
                                        /> --}}
                                @endforeach
                                 </x-slot:item>
                </x-admin.timeline-item>
                    @endforeach
               
        </x-slot:cardBody>
        </x-admin.card>

        {{-- <x-admin.pagination :type2="''" /> --}}
  


        {{ $activity->links() }}
        </x-slot:content>
    </x-admin.wrapper-container>
@endsection
