<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <form method="POST" action="{{'appointment'}}">
            @csrf
            <div>
                <div class="mb-4">
                    <label for="firstName">
                        Nume
                    </label>
                    <br>
                    <input type="text" name="firstName" placeholder="Nume"/>
                </div>
                <div class="mb-4">
                    <label for="secondName">
                        Prenume
                    </label>
                    <br>
                    <input type="text" name="secondName" placeholder="Prenume"/>
                </div>
                <div class="mb-4">
                    <label for="age">
                        Varsta
                    </label>
                    <br>
                    <input type="number" name="age" placeholder="Varsta"/>
                </div>
            </div>

            <div class="flex justify-center">
                <div>
                    <label for="appointmentDate">
                        Data rezervarii
                    </label>
                    <input
                        type="date"
                        id="date"w
                        name="appointmentDate"
                        value="<?php echo date('Y-d-m') ?>"
                        min="<?php echo date('Y-d-m') ?>"
                        required>
                </div>
                <div>
                    <label for="appointmentStartTime">
                        Ora de inceput
                    </label>
                    <input type="time" id="appointmentStartTime" name="appointmentStartTime" min="09:00" max="21:00"
                           required>
                </div>

                <div>
                    <label for="appointmentEndTime">
                        Ora de sfarsit
                    </label>
                    <input type="time" id="appointmentEndTime" name="appointmentEndTime" min="09:00" max="21:00"
                           required>
                </div>
                <div>
                    <input type="submit" value="Rezerva"/>
                </div>

            </div>
        </form>
        <small>Rezervarile se pot face de la 09:00 - 13:00 si de la 15:30 - 21:00 de Luni pana Vineri</small>
        @if(session('appointment'))
            <div class="bg-lime-500" role="alert">
                <span class="font-medium italic">{{session('appointment')}}</span>
            </div>
        @endif
    </div>

    <div id="appointmentSelectedDate">
            Valoare
    </div>

</x-app-layout>
