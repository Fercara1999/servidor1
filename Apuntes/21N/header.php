<?php

class Head extends FPDF{
    function Header() {
        $this->SetFont("Arial","B",20);
        $this->SetX(70);
        $this->SetTextColor(100,100,100);
        $this->Write(5,"DWES Claudio Moyano");
        $this->Ln();
    }

    function Footer() {
        $this->SetFont("Arial","B",20);
        $this->SetXY(-20,-20);
        $this->SetTextColor(100,100,100);
        $this->Write(5,$this -> PageNo());
        $this->Ln();
    }
}

?>