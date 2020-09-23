<?php

namespace PractiCampoUD\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CodigoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filter, $nueva_proyeccion, $nueva_solicitud)
    {
        $this->filter = $filter;
        $this->nueva_proyeccion = $nueva_proyeccion;
        $this->nueva_solicitud = $nueva_solicitud;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $filter= $this->filter;
        $nueva_proyeccion = $this->nueva_proyeccion;
        $nueva_solicitud = $this->nueva_solicitud;
        
        switch($this->filter)
        {
            case "apertura_proy":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba',['filter'=>$filter]);
                break;

            case "cierre_proy":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "apertura_solic":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "cierre_solic":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "creacion_proy":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba',['filter'=>$filter, 'nueva_proyeccion'=>$nueva_proyeccion, 'nueva_solicitud'=>$nueva_solicitud]);
                break;

            case "creacion_solic":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba',['filter'=>$filter, 'nueva_proyeccion'=>$nueva_proyeccion, 'nueva_solicitud'=>$nueva_solicitud]);
                break;

            case "aprob_coord_proy":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "aprob_coord_solic":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "aprob_ejec_solic":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "radic_avance_tesor_solic":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "info_solic_estudiantes":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "info_transp_vice":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "noti_transp_solic":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "pre_salida":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "pos_salida":
                return $this->from('trogloditascolombia@gmail.com')
                ->view('notificaciones.correoPrueba');
                break;

            case "":
                return $this->from('trogloditascolombia@gmail.com')
                ->subject('Notificación General')
                ->view('notificaciones.correoPrueba',['filter'=>$filter]);
                break;
        }
        
    }
}
