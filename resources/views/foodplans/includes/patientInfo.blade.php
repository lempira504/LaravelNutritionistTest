<div class="col invoice-col">
      
      Paciente:
      <address>
            <strong> {{ $appointment->name }} </strong><br>
            Edad: 
            @if($appointment->interview->age) 
            {{ $appointment->interview->age }}
            @else 
            <i class="fa fa-spinner fa-spin fa-xs"></i> 
            @endif 
            <br>
            795 Folsom Ave, Suite 600
            <br>
            San Francisco, CA 94107
            <br>
            Tel:
            @if($appointment->phone) 
            {{ $appointment->phone }}
            @else 
            <i class="fa fa-spinner fa-spin fa-xs"></i> 
            @endif
            <br>
            Email: {{ $appointment->interview->email }}
      </address>
</div>