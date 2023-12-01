<?php

class FacturaCRUD {
    private $conn;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para crear una factura
    public function create($facturaData) {
        $sql = "INSERT INTO Facturas (nombreComercial, razonSocial, direccionMatriz, direccionEstablecimiento, identificacionAdquirente, fechaEmision, descripcionBienServicio, cantidad, fechaCaducidad, formaPago, valorFormaPago, datosImprenta, ruc, numeroFactura, autorizacionSRI, fechaAutorizacion, informacionAdicional) VALUES (:nombreComercial, :razonSocial, :direccionMatriz, :direccionEstablecimiento, :identificacionAdquirente, :fechaEmision, :descripcionBienServicio, :cantidad, :fechaCaducidad, :formaPago, :valorFormaPago, :datosImprenta, :ruc, :numeroFactura, :autorizacionSRI, :fechaAutorizacion, :informacionAdicional)";

        $stmt = $this->conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':nombreComercial', $facturaData['nombreComercial']);
        $stmt->bindParam(':razonSocial', $facturaData['razonSocial']);
        $stmt->bindParam(':direccionMatriz', $facturaData['direccionMatriz']);
        $stmt->bindParam(':direccionEstablecimiento', $facturaData['direccionEstablecimiento']);
        $stmt->bindParam(':identificacionAdquirente', $facturaData['identificacionAdquirente']);
        $stmt->bindParam(':fechaEmision', $facturaData['fechaEmision']);
        $stmt->bindParam(':descripcionBienServicio', $facturaData['descripcionBienServicio']);
        $stmt->bindParam(':cantidad', $facturaData['cantidad']);
        $stmt->bindParam(':fechaCaducidad', $facturaData['fechaCaducidad']);
        $stmt->bindParam(':formaPago', $facturaData['formaPago']);
        $stmt->bindParam(':valorFormaPago', $facturaData['valorFormaPago']);
        $stmt->bindParam(':datosImprenta', $facturaData['datosImprenta']);
        $stmt->bindParam(':ruc', $facturaData['ruc']);
        $stmt->bindParam(':numeroFactura', $facturaData['numeroFactura']);
        $stmt->bindParam(':autorizacionSRI', $facturaData['autorizacionSRI']);
        $stmt->bindParam(':fechaAutorizacion', $facturaData['fechaAutorizacion']);
        $stmt->bindParam(':informacionAdicional', $facturaData['informacionAdicional']);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para leer una factura por ID
    public function read($id) {
        $sql = "SELECT * FROM Facturas WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar una factura
    public function update($facturaData) {
        $sql = "UPDATE Facturas SET nombreComercial = :nombreComercial, razonSocial = :razonSocial, direccionMatriz = :direccionMatriz, direccionEstablecimiento = :direccionEstablecimiento, identificacionAdquirente = :identificacionAdquirente, fechaEmision = :fechaEmision, descripcionBienServicio = :descripcionBienServicio, cantidad = :cantidad, fechaCaducidad = :fechaCaducidad, formaPago = :formaPago, valorFormaPago = :valorFormaPago, datosImprenta = :datosImprenta, ruc = :ruc, numeroFactura = :numeroFactura, autorizacionSRI = :autorizacionSRI, fechaAutorizacion = :fechaAutorizacion, informacionAdicional = :informacionAdicional WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':id', $facturaData['id']);
        $stmt->bindParam(':nombreComercial', $facturaData['nombreComercial']);
        $stmt->bindParam(':razonSocial', $facturaData['razonSocial']);
        $stmt->bindParam(':direccionMatriz', $facturaData['direccionMatriz']);
        $stmt->bindParam(':direccionEstablecimiento', $facturaData['direccionEstablecimiento']);
        $stmt->bindParam(':identificacionAdquirente', $facturaData['identificacionAdquirente']);
        $stmt->bindParam(':fechaEmision', $facturaData['fechaEmision']);
        $stmt->bindParam(':descripcionBienServicio', $facturaData['descripcionBienServicio']);
        $stmt->bindParam(':cantidad', $facturaData['cantidad']);
        $stmt->bindParam(':fechaCaducidad', $facturaData['fechaCaducidad']);
        $stmt->bindParam(':formaPago', $facturaData['formaPago']);
        $stmt->bindParam(':valorFormaPago', $facturaData['valorFormaPago']);
        $stmt->bindParam(':datosImprenta', $facturaData['datosImprenta']);
        $stmt->bindParam(':ruc', $facturaData['ruc']);
        $stmt->bindParam(':numeroFactura', $facturaData['numeroFactura']);
        $stmt->bindParam(':autorizacionSRI', $facturaData['autorizacionSRI']);
        $stmt->bindParam(':fechaAutorizacion', $facturaData['fechaAutorizacion']);
        $stmt->bindParam(':informacionAdicional', $facturaData['informacionAdicional']);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para eliminar una factura por ID
    public function delete($id) {
        $sql = "DELETE FROM Facturas WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para obtener todas las facturas
    public function getAll() {
        $sql = "SELECT * FROM Facturas";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
