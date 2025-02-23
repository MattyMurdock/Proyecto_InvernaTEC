from machine import Pin,ADC
from machine import Timer
from time import sleep
import time
import dht
import machine
import gc
import socket

relayA = Pin(26, Pin.OUT)
relayB = Pin(25, Pin.OUT)
d = dht.DHT22(machine.Pin(33))
Sensor_ADC1 = ADC(Pin(34))
Sensor_ADC2 = ADC(Pin(35))
relayA.value(1)
relayB.value(1)
d.measure()

def red():
    import network
    wlan = network.WLAN(network.STA_IF)
    wlan.active(True)
    if not wlan.isconnected():
        print('connecting to network...')
        wlan.connect('HUAWEI_A402', '17270149JCSP*')
        while not wlan.isconnected():
            pass
    print('network config:', wlan.ifconfig())
    print(wlan.status())

def principal():
    print(" ")
    print("--------------------------------------")
    Sensor_ADC1.atten(ADC.ATTN_11DB)
    Sensor_ADC1.width(ADC.WIDTH_10BIT)
    Sensor_ADC2.atten(ADC.ATTN_11DB)
    Sensor_ADC2.width(ADC.WIDTH_10BIT)
    #############
    Sensor_suelo = Sensor_ADC1.read()
    print(Sensor_suelo)
    Porcentaje_suelo = (Sensor_suelo/10.23)
    Humedad_suelo = 100.00 - Porcentaje_suelo
    ##############
    Sensor_agua = Sensor_ADC2.read()
    print(Sensor_agua)
    Cantidad_agua = (Sensor_agua/6.2)
    ##############
    T1 = d.temperature()
    T2 = d.humidity()
    ##############
    print("Temperatura ambiental: {0:.1f}° ".format(T1))
    print("Humedad ambiental: {0:.2f}% ".format(T2))
    print("Humedad Tierra: {0:.2f}% ".format(Humedad_suelo))
    print("Nivel de Agua: {0:.2f}% ".format(Cantidad_agua))
    ###############
    if Humedad_suelo <= 60:
        relayA.value(0)
        time.sleep(0.2)
        relayA.value(1)
        ##############
        addr = socket.getaddrinfo('sisprograma.000webhostapp.com', 80)[0][-1]
        s = socket.socket()
        s.connect((addr))
        s.send(bytes('GET /ingreso2.php?usuario=Automatico&actuador=Bomba&marca=1 HTTP/1.0\r\nHost: sisprograma.000webhostapp.com\r\n\r\n', 'utf8'))
        s.close
    ###############
    addr = socket.getaddrinfo('145.14.144.43', 80)[0][-1]
    s = socket.socket()
    s.connect((addr))
    s.send(bytes('GET /cambiaTem.php?valor={0:.1f}° HTTP/1.0\r\nHost: sisprograma.000webhostapp.com\r\n\r\n', 'utf8').format(T1))
    s.close
    ##############
    addr = socket.getaddrinfo('sisprograma.000webhostapp.com', 80)[0][-1]
    s = socket.socket()
    s.connect((addr))
    s.send(bytes('GET /cambiaHumeAm.php?valor={0:.1f}% HTTP/1.0\r\nHost: sisprograma.000webhostapp.com\r\n\r\n', 'utf8').format(T2))
    s.close
    ##############
    addr = socket.getaddrinfo('sisprograma.000webhostapp.com', 80)[0][-1]
    s = socket.socket()
    s.connect((addr))
    s.send(bytes('GET /cambiaHumedad.php?valor={0:.1f}% HTTP/1.0\r\nHost: sisprograma.000webhostapp.com\r\n\r\n', 'utf8').format(Humedad_suelo))
    s.close
    ##############
    addr = socket.getaddrinfo('145.14.144.43', 80)[0][-1]
    s = socket.socket()
    s.connect((addr))
    s.send(bytes('GET /cambiaNivelAgua.php?valor={0:.1f}% HTTP/1.0\r\nHost: sisprograma.000webhostapp.com\r\n\r\n', 'utf8').format(Cantidad_agua))
    s.close
    ###############################################################################
    addr = socket.getaddrinfo('sisprograma.000webhostapp.com', 80)[0][-1]
    s = socket.socket()
    s.connect((addr))
    s.send(bytes('GET /DatoBomba.php HTTP/1.0\r\nHost: sisprograma.000webhostapp.com\r\n\r\n', 'utf8'))
    data = s.recv(1000)
    data = str(data)
    #print(data)
    s.close
    if "ON" in data:
        print("Encendido")
        relayA.value(0)
        time.sleep(0.2)
        relayA.value(1)
        ####################
        addr = socket.getaddrinfo('sisprograma.000webhostapp.com', 80)[0][-1]
        s = socket.socket()
        s.connect((addr))
        s.send(bytes('GET /cambiaBomba.php?valor=OFF HTTP/1.0\r\nHost: sisprograma.000webhostapp.com\r\n\r\n', 'utf8'))
    if "OFF" in data:
        print("Apagado")
        relayA.value(1)
        time.sleep(5)
    #################################################################################
    addr = socket.getaddrinfo('sisprograma.000webhostapp.com', 80)[0][-1]
    s = socket.socket()
    s.connect((addr))
    s.send(bytes('GET /DatoVentilador.php HTTP/1.0\r\nHost: sisprograma.000webhostapp.com\r\n\r\n', 'utf8'))
    data = s.recv(1000)
    data = str(data)
    #print(data)
    s.close
    gc.collect()
    C = gc.mem_free()
    if "ON" in data:
        print("Encendido")
        relayB.value(0)
        time.sleep(5)
    if "OFF" in data:
        print("Apagado")
        relayB.value(1)
        time.sleep(5)
    print("--------------------------------------")


red()
tim1 = Timer(1)
tim1.init(period=20000, mode=Timer.PERIODIC, callback=lambda t:principal())
