<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        @page {
            margin: 30px 50px 30px 50px;
            /* espacio para header y footer 
            margin: [TOP] [RIGHT] [BOTTOM] [LEFT];
            */
        }

        /*body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
    }*/

        footer {
            position: fixed;
            bottom: -40px;
            left: 0;
            right: 0;
            height: 50px;
            font-size: 10px;
            text-align: center;
            color: #888;
        }
    </style>

    </style>
    <title>Formulario 008 – Emergencias (MSP Ecuador)</title>
</head>

<body>

    <head>

    </head>

    <main>
        {{-- Encabezado institucional --}}
        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 8px;">
            <thead>
                <tr style="background-color: #D9D9FF;">
                    <th colspan="5" style="text-align: left; font-weight: bold; font-size: 12px;">A. DATOS DEL ESTABLECIMIENTO</th>
                </tr>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <th style="padding: 3px;">INSTITUCIÓN DEL SISTEMA</th>
                    <th style="padding: 3px;">UNICÓDIGO</th>
                    <th style="padding: 3px;">ESTABLECIMIENTO DE SALUD</th>
                    <th style="padding: 3px;">NÚMERO DE HISTORIA CLÍNICA ÚNICA</th>
                    <th style="padding: 3px;">NÚMERO DE ARCHIVO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 2px; height: 7px;">MINISTERIO DE SALUD PÚBLICA</td>
                    <td style="padding: 2px; height: 7px;">2957</td>
                    <td style="padding: 2px; height: 7px;">HOSPITAL BÁSICO DEL CANTÓN PICHINCHA</td>
                    <td style="padding: 2px; height: 7px;">{{ $admision->identificacion_code }}</td>
                    <td style="padding: 2px; height: 7px;">{{ $admision->identificacion_code }}</td>
                </tr>
            </tbody>
        </table>

        <div style="height: 10px;"></div>

        {{-- B. REGISTRO DE ADMISIÓN--}}

        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-bottom: none;">
            <thead>
                <tr style="background-color: #D9D9FF;">
                    <th colspan="12" style="text-align: left; font-size: 12px;">B. REGISTRO DE ADMISIÓN</th>
                </tr>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <th colspan="5">FECHA DE ADMISIÓN</th>
                    <th colspan="5">ADMISIONISTA</th>
                    <th colspan="2" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="background-color: #D9FFCC; text-align: center;">
                                <td colspan="2" style="font-weight: bold; text-align: center; border-bottom: 1px solid #999;">HISTORIA CLÍNICA EN ESTABLECIMIENTO</td>
                            </tr>
                            <tr style="text-align: center;">
                                <td style="border-right: 1px solid #999;">SI</td>
                                <td>NO</td>
                            </tr>
                        </table>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5">{{ $admision?->fecha }}</td>
                    <td colspan="5">{{ $admision?->user->name }}</td>
                    <td>X</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <thead>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <td style="width: 20.83%; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">PRIMER APELLIDO</td>
                    <td style="width: 20.83%; border-right: 1px solid #999; border-bottom: 1px solid #999;">SEGUNDO APELLIDO</td>
                    <td style="width: 20.83%; border-right: 1px solid #999; border-bottom: 1px solid #999;">PRIMER NOMBRE</td>
                    <td style="width: 20.83%; border-right: 1px solid #999; border-bottom: 1px solid #999;">SEGUNDO NOMBRE</td>
                    <td colspan="4" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="background-color: #D9FFCC; text-align: center;">
                                <td colspan="4" style="font-weight: bold; text-align: center;border-right: 1px solid #999; border-bottom: 1px solid #999;">TIPO DE DOCUMENTO DE IDENTIFICACIÓN</td>
                            </tr>
                            <tr style="text-align: center;">
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">CC/CI</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">PAS.</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">CARNÉ</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">S/D</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 20.83%; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->apellido_primero }}</td>
                    <td style="width: 20.83%; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->apellido_segundo }}</td>
                    <td style="width: 20.83%; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->nombre_primero }}</td>
                    <td style="width: 20.83%; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->nombre_segundo }}</td>
                    <td style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;"> {{ $admision?->identificacion_tipo_id == 'Cédula de Identidad' ? '✓' : '' }}</td>
                    <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->identificacion_tipo_id == 'Pasaporte' ? '✓' : '' }}</td>
                    <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->identificacion_tipo_id == 'Carnet de Refugiaso' ? '✓' : '' }}</td>
                    <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->identificacion_tipo_id == 'Sin Documento de Identidad' ? '✓' : '' }}</td>
                </tr>
            </tbody>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <thead>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <td colspan="3" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="background-color: #D9FFCC; text-align: center;">
                                <td colspan="7" style="font-weight: bold; text-align: center; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">ESTADO CIVIL</td>
                            </tr>
                            <tr style="text-align: center;">
                                <td style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">SOL</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">CAS</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">DIV</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">VIU</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">UN</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">U-H</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">NA</td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="1" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">SEXO</td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">Nº TELÉFONO FIJO</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">Nº TELÉFONO CELULAR</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">FECHA DE NACIMIENTO</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="text-align: center;">
                                <td style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->estado_civil == 'soltero' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->estado_civil == 'casado' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->estado_civil == 'divorciado' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->estado_civil == 'viudo' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->estado_civil == 'union_libre' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->estado_civil == 'separado' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="1" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->sexo }}</td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->telefono_fijo }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->telefono_celular }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->fecha_nacimiento }}</td>
                </tr>
            </tbody>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <thead>
                <tr style="font-weight: bold; text-align: center;">
                    <td colspan="3" style="background-color: #D9FFCC; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">LUGAR DE NACIMIENTO</td>
                    <td colspan="3" style="background-color: #D9FFCC; border-right: 1px solid #999; border-bottom: 1px solid #999;">NACIONALIDAD</td>
                    <td colspan="1" style="background-color: #D9FFCC; border-right: 1px solid #999; border-bottom: 1px solid #999;">EDAD</td>
                    <td colspan="2" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="background-color: #D9FFCC; text-align: center;">
                                <td colspan="4" style="font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;">CONDICIÓN EDAD</td>
                            </tr>
                            <tr style="text-align: center;">
                                <td style="background-color: #D9FFCC; border-right: 1px solid #999; border-bottom: 1px solid #999;">H</td>
                                <td style="background-color: #D9FFCC; border-right: 1px solid #999; border-bottom: 1px solid #999;">D</td>
                                <td style="background-color: #D9FFCC; border-right: 1px solid #999; border-bottom: 1px solid #999;">M</td>
                                <td style="background-color: #D9FFCC; border-right: 1px solid #999; border-bottom: 1px solid #999;">A</td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="3" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="text-align: center;">
                                <td colspan="8" style="background-color: #D9FFCC; font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;">GRUPO PRIORITARIO</td>
                                <td colspan="1" style="background-color: #D9FFCC; font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;">SI</td>
                                <td colspan="1" style="font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>
                                <td colspan="1" style="background-color: #D9FFCC; font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;">NO</td>
                                <td colspan="1" style="font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>
                            </tr>
                            <tr style="text-align: center;">
                                <td colspan="4" style="background-color: #D9FFCC; font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;">ESPECIFIQUE</td>
                                <td colspan="8" style="font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>
                            </tr>
                        </table>
                    </td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->nacimiento_lugar }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->nacionalidad_id }}</td>
                    <td colspan="1" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>
                    <td colspan="2" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="text-align: center;">
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">&nbsp;</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"></td>

                </tr>
            </tbody>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <thead>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">AUTOIDENTIFICACIÓN ÉTNICA</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">NACIONALIDAD ÉTNICA</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">*PUEBLOS</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">NIVEL DE EDUCACIÓN</td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->etnico_grupo_id }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->indigena_nacionalidad_id }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->indigena_pueblo_id }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->educacion_nivel_id }}</td>
                </tr>
            </tbody>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <thead>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">ESTADO DEL NIVEL DE EDUCACIÓN</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">TIPO DE EMPRESA DE TRABAJO</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">OCUPACIÓN / PROFESIÓN</td>
                    <td colspan="3" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 6px; table-layout: fixed;">
                            <tr style="background-color: #D9FFCC; text-align: center;">
                                <td colspan="6" style="font-weight: bold; text-align: center; border-right: 1px solid #999; border-bottom: 1px solid #999;">SEGURO SALUD PRINCIPAL</td>
                            </tr>
                            <tr style="text-align: center;">
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">IESS-G</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">IESS-C</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">ISSPOL</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">ISSFA</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">PRIV.</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">NING.</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->educacion_estado_nivel_id }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->empresa_tipo_trabajo }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->ocupacion_profesion }}</td>
                    <td colspan="3" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="text-align: center;">
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->salud_seguro_id == 'IESS GENERAL' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->salud_seguro_id == 'IESS CAMPESINO' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->salud_seguro_id == 'ISSPOL' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->salud_seguro_id == 'ISSFA' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->salud_seguro_id == 'Seguro Privado' ? '✓' : '' }}</td>
                                <td style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->salud_seguro_id == 'No Posee' ? '✓' : '' }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <thead>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">AUTOIDENTIFICACIÓN ÉTNICA</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">NACIONALIDAD ÉTNICA</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">*PUEBLOS</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">NIVEL DE EDUCACIÓN</td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->etnico_grupo_id }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->indigena_nacionalidad_id }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->indigena_pueblo_id }}</td>
                    <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->educacion_nivel_id }}</td>
                </tr>
            </tbody>
        </table>


        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                <td colspan="2" rowspan="4" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">RESIDENCIA</td>
                <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">PROVINCIA</td>
                <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">CANTÓN</td>
                <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">PARROQUIA</td>
                <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">BARRIO O SECTOR</td>
            </tr>
            <tr>
                <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"> {{ $admision?->provincia_id }} </td> <!-- PROVINCIA -->
                <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"> {{ $admision?->canton_id }} </td> <!-- CANTÓN -->
                <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"> {{ $admision?->parroquia_id }} </td> <!-- PARROQUIA -->
                <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"> {{ $admision?->sector }}</td> <!-- BARRIO O SECTOR -->
            </tr>
            <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">CALLE PRINCIPAL</td>
                <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">CALLE SECUNDARIA</td>
                <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">REFERENCIA</td>
            </tr>
            <tr>
                <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"> {{ $admision?->calle_principal }} </td> <!-- CALLE PRINCIPAL -->
                <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"> {{ $admision?->calle_secundaria }} </td> <!-- CALLE PRINCIPAL -->
                <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;"> {{ $admision?->referencia }}
            </tr>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <thead>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <td colspan="4" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">EN CASO NECESARIO LLAMAR A:</td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">PARENTESCO</td>
                    <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">DIRECCIÓN</td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">Nº TELÉFONO</td>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->contacto_referencia }}</td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->familiar_parentesco_id }}</td>
                    <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->direccion }}</td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->telefono_contacto }}</td>
                </tr>
            </tbody>
        </table>

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed; border-top: none;">
            <thead>
                <tr style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    <td colspan="4" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                            <tr style="background-color: #D9FFCC; text-align: center;">
                                <td colspan="12" style="font-weight: bold; text-align: center; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">FORMA DE LLEGADA</td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">FUENTE DE INFORMACIÓN</td>
                    <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">INSTITUCIÓN O PERSONA QUE ENTREGA AL PACIENTE</td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">Nº TELÉFONO</td>
                </tr>
            </thead>
            <tbody>
                <tr style="font-weight: bold; text-align: center;">
                    <td colspan="4" rowspan="1">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 6px; table-layout: fixed;">
                            <tr style="text-align: center;">
                                <td colspan="3" style="background-color: #D9FFCC; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">AMBULATORIO</td>
                                <td colspan="1" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->forma_llegada == 'ambulatorio' ? '✓' : '' }}</td>
                                <td colspan="3" style="background-color: #D9FFCC;border-right: 1px solid #999; border-bottom: 1px solid #999;">AMBULANCIA</td>
                                <td colspan="1" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->forma_llegada == 'ambulancia' ? '✓' : '' }}</td>
                                <td colspan="3" style="background-color: #D9FFCC; border-right: 1px solid #999; border-bottom: 1px solid #999;">OTRO TRANSPORTE</td>
                                <td colspan="1" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->forma_llegada == 'otro transporte' ? '✓' : '' }}</td>
                            </tr>
                        </table>
                    </td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->fuente_informacion }}</td>
                    <td colspan="4" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->institucion_persona }}</td>
                    <td colspan="2" style="border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $admision?->telefono }}</td>
                </tr>

            </tbody>
        </table>

        <div style="height: 10px;"></div>
        {{-- C. INICIO DE ATENCIÓN--}}

        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            <tr style="background-color: #D9D9FF;">
                <th colspan="12" style="text-align: left; font-size: 12px;">C. INICIO DE ATENCIÓN</th>
            </tr>
            <tr style=" text-align: center;">
                <td style="font-weight: bold; background-color: #D9FFCC;" colspan="1">FECHA</td>
                <td colspan="1">{{ $formulario?->fechaI }}</td>
                <td style="font-weight: bold; background-color: #D9FFCC;" colspan="1">HORA</td>
                <td colspan="1">{{ $formulario?->horaI }}</td>
                <td style="font-weight: bold; background-color: #D9FFCC;" colspan="2">CONDICIÓN DE LLEGADA</td>
                <td style="font-weight: bold; background-color: #D9FFCC;" colspan="1">ESTABLE</td>
                <td colspan="1">{{ $formulario?->condicion_llegada == 'estable' ? '✓' : '' }}</td>
                <td style="font-weight: bold; background-color: #D9FFCC;" colspan="1">INESTABLE</td>
                <td colspan="1">{{ $formulario?->condicion_llegada == 'inestable' ? '✓' : '' }}</td>
                <td style="font-weight: bold; background-color: #D9FFCC;" colspan="1">FALLECIDO</td>
                <td colspan="1">{{ $formulario?->condicion_llegada == 'fallecido' ? '✓' : '' }}</td>
            </tr>
            <tr>
                <td style="background-color: #D9FFCC; font-weight: bold; text-align: center;" colspan="1">MOTIVO DE ATENCIÓN</td>
                <td colspan="11" style="padding: 3px;"> {!! nl2br(e($formulario?->motivo_atencion)) !!} </td>
            </tr>
        </table>

        <div style="height: 10px;"></div>
        {{-- D. ACCIDENTE, VIOLENCIA, INTOXICACIÓN--}}

        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            <tr style="background-color: #D9D9FF;">
                <th colspan="12" style="text-align: left; font-size: 12px;">D. ACCIDENTE, VIOLENCIA, INTOXICACIÓN</th>
            </tr>
            <tr>
                <td colspan="1" style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    FECHA<br><span style="font-weight: normal; font-size: 6px;">(aaaa-mm-dd)</span>
                </td>
                <td colspan="1" style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    HORA<br><span style="font-weight: normal; font-size: 6px;">(hh:mm)</span>
                </td>
                <td colspan="4" style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    LUGAR DEL EVENTO
                </td>
                <td colspan="4" style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    DIRECCIÓN DEL EVENTO
                </td>
                <td colspan="2" style="background-color: #D9FFCC; font-weight: bold; text-align: center;">
                    CUSTODIA POLICIAL
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="1">{{ $formularioEvento?->fechaE}}</td>
                <td colspan="1">{{ $formularioEvento?->horaE }}</td>
                <td colspan="4">{{ $formularioEvento?->lugar_evento }}</td>
                <td colspan="4">{{ $formularioEvento?->direccion_evento }}</td>
                <td colspan="2" rowspan="1">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                        <tr style="text-align: center;">
                            <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999;  text-align: center;">SI</td>
                            <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999;  text-align: center;">@if($formularioEvento?->custodia_policial == 'si') ✔ @endif</td>
                            <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999;  text-align: center;">NO</td>
                            <td colspan="3" style="border-left: 1px solid #999; border-right: 1px solid #999;  text-align: center;">@if($formularioEvento?->custodia_policial == 'no') ✔ @endif</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            @foreach($accidente->chunk(8) as $grupo)
            <tr>
                @foreach($grupo as $ant)
                <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999; text-align: center;">{{ $ant->nombre }}</td>
                <td width="5%" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999; text-align: center;">
                    {{ in_array($ant->id, $tiposSeleccionados) ? '✓' : '' }}
                </td>
                @endforeach
            </tr>
            @endforeach
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            @foreach($violencia->chunk(8) as $grupo)
            <tr>
                @foreach($grupo as $ant)
                <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;  text-align: center;">{{ $ant->nombre }}</td>
                <td width="5%" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999; text-align: center;">
                    {{ in_array($ant->id, $tiposSeleccionados) ? '✓' : '' }}
                </td>
                @endforeach
                <td width="17%" rowspan="1">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                        <tr>
                            <td colspan="12" style="border-bottom: 1px solid #999; border-right: 1px solid #999; text-align: center;">NOTIFICACIÓN</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999; font-weight: bold; text-align: center;">SI</td>
                            <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999; font-weight: bold; text-align: center;">{{ $formularioEvento?->notificacion == 'si' ? '✓' : '' }}</td>
                            <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999; font-weight: bold; text-align: center;">NO</td>
                            <td colspan="3" style="border-right: 1px solid #999; border-bottom: 1px solid #999; font-weight: bold; text-align: center;">{{ $formularioEvento?->notificacion == 'no' ? '✓' : '' }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach

        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            @foreach($intoxicacion->chunk(8) as $grupo)
            <tr>
                @foreach($grupo as $ant)
                <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-right: 1px solid #999; text-align: center;">{{ $ant->nombre }}</td>
                <td width="5%" style="border-left: 1px solid #999; border-right: 1px solid #999; text-align: center;">
                    {{ in_array($ant->id, $tiposSeleccionados) ? '✓' : '' }}
                </td>
                @endforeach
            </tr>
            @endforeach
        </table>

        <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            <tr>
                <td colspan="2" style="background-color: #D9FFCC; text-align: left;font-weight: bold;">OBSERVACIONES</td>
                <td colspan="10"></td>
            </tr>
            <tr>
                <td colspan="12" style="padding-left: 2px; padding-bottom: 50px;">
                    <!--<div style="margin-bottom: 30px;">-->
                    {!! nl2br(e($formularioEvento?->observacion)) !!}
                    <!--</div>-->
                </td>
            </tr>
            <tr>
                <td colspan="9"></td>
                <td colspan="2" style="background-color: #D9FFCC; text-align: center;font-weight: bold; font-size: 6px;">SUGESTIVO DE ALIENTO ALCOHÓLICO</td>
                <td width="5%">{{ $formularioEvento?->sugestivo_aliento_alcoholico ? '✓' : '' }}</td>
            </tr>
        </table>

        <div style="height: 10px;"></div>

        {{-- E. ANTECEDENTES PATOLÓGICOS PERSONALES Y FAMILIARES--}}

        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            <tr style="background-color: #D9D9FF;">
                <th colspan="7" style="text-align: left; font-size: 12px; border-left: 1px solid #999; border-top: 1px solid #999; border-bottom: 1px solid #999;">E. ANTECEDENTES PATOLÓGICOS PERSONALES Y FAMILIARES</th>
                <th colspan="3" style="font-weight: normal; text-align: right; font-size: 6px; border-right: 1px solid #999; border-top: 1px solid #999; border-bottom: 1px solid #999;">MARCAR CON X EL NÚMERO CORRESPONDEINTE Y DESCRIBIR SEÑALANDO EL NÚMERO</th>
                <th width="4%" style="font-weight: normal; text-align: center; font-size: 6px; border-right: 1px solid #999; border-top: 1px solid #999; border-bottom: 1px solid #999;">NO APLICA</th>
                <th width="3%" style="background-color: #fcfcfdff; font-weight: normal; text-align: center; font-size: 6px; border-right: 1px solid #999; border-top: 1px solid #999; border-bottom: 1px solid #999;"></th>
            </tr>
        </table>

        @php
            $filas = 2; // número de filas por columna
            $total = count($antecedentes);
            $columnas = ceil($total / $filas);

            $columnData = [];
            for ($i = 0; $i < $columnas; $i++) {
                $columnData[] = array_slice($antecedentes->all(), $i * $filas, $filas);
            }
        @endphp

        <table width="100%" border="0" cellspacing="0" cellpadding="3" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            @for ($fila = 0; $fila < $filas; $fila++)
                <tr>
                    @foreach ($columnData as $colIndex => $col)
                        @php
                            $ant = $col[$fila] ?? null;
                        @endphp
                        @if ($ant)
                            @php
                                $numero = ($colIndex * $filas) + $fila + 1;
                            @endphp
                            <td width="20%" style="background-color: #D9FFCC; border: 1px solid #999; text-align: left;">
                                {{ $numero }}. {{ $ant->nombre }}
                            </td>
                            <td width="5%" style="border: 1px solid #999; text-align: center;">
                                {{ in_array($ant->id, $antecedenteSeleccionados) ? '✓' : '' }}
                            </td>
                        @else
                            <td colspan="2"></td>
                        @endif
                    @endforeach
                </tr>
            @endfor
        </table>


        <!--@php
        $columnas = 5;
        $impares = $antecedentes->filter(function($ant, $index) {
            return ($index + 1) % 2 !== 0;
        })->values();

        $pares = $antecedentes->filter(function($ant, $index) {
            return ($index + 1) % 2 === 0;
        })->values();
        @endphp

        <table width="100%" border="0" cellspacing="0" cellpadding="3" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            {{-- Fila de IMPARES --}}
            <tr>
                @for ($i = 0; $i < $columnas; $i++)
                    @php
                    $ant=$impares->get($i);
                    @endphp
                    @if ($ant)
                    <td width="20%" style="background-color: #D9FFCC; border: 1px solid #999; text-align: left;">
                        {{ ($ant->id) }}. {{ $ant->nombre }}
                    </td>
                    <td width="5%" style="border: 1px solid #999; text-align: center;">
                        {{ in_array($ant->id, $antecedenteSeleccionados) ? '✓' : '' }}
                    </td>
                    @else
                    <td colspan="2"></td>
                    @endif
                    @endfor
            </tr>

            {{-- Fila de PARES --}}
            <tr>
                @for ($i = 0; $i < $columnas; $i++)
                    @php
                    $ant=$pares->get($i);
                    @endphp
                    @if ($ant)
                    <td width="20%" style="background-color: #D9FFCC; border: 1px solid #999; text-align: left;">
                        {{ ($ant->id) }}. {{ $ant->nombre }}
                    </td>
                    <td width="5%" style="border: 1px solid #999; text-align: center;">
                        {{ in_array($ant->id, $antecedenteSeleccionados) ? '✓' : '' }}
                    </td>
                    @else
                    <td colspan="2"></td>
                    @endif
                    @endfor
            </tr>
        </table>-->
            <!--<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
            <?php
            $i = 0;
            ?>
            @foreach($antecedentes->chunk(5) as $grupo)
            <tr>
                @foreach($grupo as $ant)
                <?php
                $i++;
                ?>
                <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999; text-align: left;">{{ $i }}. {{ $ant->nombre }}</td>
                <td width="5%" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999; text-align: center;">
                    {{ in_array($ant->id, $antecedenteSeleccionados) ? '✓' : '' }}
                </td>
                @endforeach
            </tr>
            @endforeach
        </table>-->

            <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                <tr>
                    <td colspan="12" style="padding-left: 2px; padding-bottom: 50px; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;"> {!! nl2br(e($formularioAntecedente?->observacion)) !!}</td>
                </tr>
            </table>

            <div style="height: 10px;"></div>

            {{-- F. ENFERMEDAD O PROBLEMA ACTUAL--}}

            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                <tr style="background-color: #D9D9FF;">
                    <th colspan="8" style="text-align: left; font-size: 12px; border-left: 1px solid #999; border-top: 1px solid #999; border-bottom: 1px solid #999;">F. ENFERMEDAD O PROBLEMA ACTUAL</th>
                    <th colspan="4" style="font-weight: normal; text-align: right; font-size: 6px; border-right: 1px solid #999; border-top: 1px solid #999; border-bottom: 1px solid #999;">CRONOLOGÍA - LOCALIZACIÓN - CARACTERÍSTICAS - INTENSIDAD - FRECUENCIA - FACTORES AGRAVANTES</th>
                </tr>
                <tr>
                    <td colspan="12" style="padding-left: 2px; padding-bottom: 30px; border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">
                        <!-- page-break-inside: auto; white-space: pre-wrap; -->
                        {!! nl2br(e($formularioEvolucion?->evolucion)) !!}
                    </td>
                </tr>
            </table>

            <div style="height: 10px;"></div>

            {{-- G. CONSTANTES VITALES Y ANTROPOMETRÍA--}}

            <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; table-layout: fixed;">
                <tr style="background-color: #D9D9FF;">
                    <th colspan="12" style="text-align: left; font-size: 12px;">G. CONSTANTES VITALES Y ANTROPOMETRÍA</th>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2" style="padding: 5px; background-color: #D9FFCC; font-size: 7px;">SIN CONSTANTES VITALES</td>
                    <td colspan="1">{{ $formularioSignos?->sin_signos_vitales}}</td>
                    <td colspan="2" style="background-color: #D9FFCC; font-size: 7px;">PRESIÓN ARTERIAL(mmHg)</td>
                    <td colspan="1">{{ $formularioSignos?->presion_arterial }}</td>
                    <td colspan="2" style="background-color: #D9FFCC; font-size: 7px;">PULSO / min</td>
                    <td colspan="1">{{ $formularioSignos?->frecuencia_cardiaca }}</td>
                    <td colspan="2" style="background-color: #D9FFCC; font-size: 7px;">FRECUENCIA RESPIRATORIA / min</td>
                    <td colspan="1">{{ $formularioSignos?->frecuencia_respiratoria }}</td>
                </tr>
                <tr style="text-align: center;">
                    <td colspan="2" style="background-color: #D9FFCC; font-size: 7px;">PULSIOXIMETRIA (%)</td>
                    <td colspan="1">{{ $formularioSignos?->saturacion_oxigeno }}</td>
                    <td colspan="2" style="background-color: #D9FFCC; font-size: 7px;">PERÍMETRO CEFÁLICO (cm)</td>
                    <td colspan="1">{{ $formularioAntropometica?->perimetro_cefalico }}</td>
                    <td colspan="1" style="background-color: #D9FFCC; font-size: 7px;">PESO (kg)</td>
                    <td colspan="1">{{ $formularioAntropometica?->peso }}</td>
                    <td colspan="1" style="background-color: #D9FFCC; font-size: 7px;">TALLA (cm)</td>
                    <td colspan="1">{{ $formularioAntropometica?->talla_estatura }}</td>
                    <td colspan="1" style="background-color: #D9FFCC; font-size: 7px;">GLICEMIA CAPILAR (mg/dl)</td>
                    <td colspan="1">{{ $formularioCapilar?->glucosa_capilar }}</td>
                </tr>


            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; font-size: 7px; text-align: center; table-layout: fixed;">
                <tr>
                    <td width="20%" style="font-weight: bold; background-color: #D9FFCC; border-left: 1px solid #999; border-bottom: 1px solid #999; text-align: left; font-size: 7px;">GLASGOW INICIAL</td>
                    <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-bottom: 1px solid #999; text-align: center; font-size: 7px;">OCULAR (4)</td>
                    <td width="10%" style="border-left: 1px solid #999; border-bottom: 1px solid #999;">{{ $formularioNeurolica?->glasgow_ocular }}</td>
                    <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-bottom: 1px solid #999; text-align: center; font-size: 7px;">VERBAL (5)</td>
                    <td width="10%" style="border-left: 1px solid #999; border-bottom: 1px solid #999;">{{ $formularioNeurolica?->glasgow_verbal }}</td>
                    <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-bottom: 1px solid #999; text-align: center; font-size: 7px;">MOTORA (6)</td>
                    <td width="10%" style="border-left: 1px solid #999; border-bottom: 1px solid #999;">{{ $formularioNeurolica?->glasgow_motora }}</td>
                    <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-bottom: 1px solid #999; text-align: center; font-size: 7px;">REACCIÓN PUPILA DER.</td>
                    <td width="10%" style="border-left: 1px solid #999; border-bottom: 1px solid #999;">{{ $formularioNeurolica?->reaccion_pupilar_derecha }}</td>
                    <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-bottom: 1px solid #999; text-align: center; font-size: 7px;">REACCIÓN PUPILA IZQ.</td>
                    <td width="10%" style="border-left: 1px solid #999; border-bottom: 1px solid #999;">{{ $formularioNeurolica?->reaccion_pupilar_izquierda }}</td>
                    <td width="20%" style="background-color: #D9FFCC; border-left: 1px solid #999; border-bottom: 1px solid #999; text-align: center; font-size: 7px;">T. LLENADO CAPILAR</td>
                    <td width="10%" style="border-left: 1px solid #999; border-right: 1px solid #999; border-bottom: 1px solid #999;">{{ $formularioCapilar?->tiempo_llenado_capilar }}</td>
                </tr>
            </table>

            <div style="height: 10px;"></div>

            {{-- H. EXAMEN FÍSICO--}}

    </main>

    <footer>

    </footer>

    <!--<script type="text/php">
        if(isset($pdf)){
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(300, 800, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }   
    </script>-->

    <script type="text/php">
        if (isset($pdf)) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial", "normal");
            $size = 6;
            $pageText = "EMERGENCIA ($PAGE_NUM)";
            $x = 508;
            $y = 820;
            $pdf->text($x, $y, $pageText, $font, $size);

            $leftText = "SNS-MSP/HCU-form.008/2021";
            $pdf->text(38, $y, $leftText, $font, $size);
        ');
    }
</script>

</body>

</html>