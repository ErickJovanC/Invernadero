<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'telefono',
        'direccion',
        'foto',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function datosPersonales(){
        return $this->hasOne(RegistroPersonal::class); // Usado para el registro de los datos personales
    }

    public function huertas(){
        return $this->hasMany(RegistroPropiedad::class);
    }
    
    public function secciones(){
        return $this->hasMany(Seccion::class);
    }
    
    public function empleados(){
        return $this->hasMany(Empleado::class)->orderBy('nombreEmpleado'); 
    }
    
    public function suelos(){
        return $this->hasMany(PreparacionSuelo::class);
    }

    public function planta(){
        return $this->hasMany(CalidadPlanta::class);
    }

    public function controlPreventivoPlanta(){
        return $this->hasMany(ControlPreventivo::class);
    }

    public function registroSiembra(){
        return $this->hasMany(RegistroSiembra::class);
    }

    public function registroCosecha(){
        return $this->hasMany(Cosecha::class);
    }

    public function registroFertilizante(){
        return $this->hasMany(Fertilizante::class);
    }

    public function aplicacionFertilizante(){
        return $this->hasMany(AplicacionFertilizante::class);
    }

    public function fertilizanteOrganico(){
        return $this->hasMany(AplicacionFertilizanteOrganico::class);
    }

    public function riego(){
        return $this->hasMany(RegistroRiego::class);
    }

    public function limpiezaCanales(){
        return $this->hasMany(LimpiezaCanales::class);
    }

    public function controlPreventivoArbol(){
        return $this->hasMany(ControlPreventivoPlaga::class);
    }

    public function identificacionPlagas(){
        return $this->hasMany(IdentificacionPlagas::class);
    }

    public function aplicacionPlaguicida(){
        return $this->hasMany(AplicacionPlaguicida::class);
    }

    public function capacitacion(){
        return $this->hasMany(CapacitacionPersonal::class);
    }

    public function calibracionEquipo(){
        return $this->hasMany(CalibracionEquipo::class);
    }

    public function clientes(){
        return $this->hasMany(Cliente::class);
    }

    public function cosechas(){
        return $this->hasMany(Cosecha::class);
    }
}