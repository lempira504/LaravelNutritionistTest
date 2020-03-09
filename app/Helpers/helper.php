<?php




    /**Genera el codigo para el paciente
     *date('F Y h:i:s');
     */
    function makeCode()
    {
        // $customerCode = bcrypt(date('F Y h:i:s'));
        $customerCode = 'NG-' . date('Y');
        $customerCode .= '_' . date('m');
        $customerCode .= '_' . date('d');
        $customerCode .= '_' . date('h');
        $customerCode .= '_' . date('i');
        $customerCode .= '_' . date('s');


        return $customerCode;
    }