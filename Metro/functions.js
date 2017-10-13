/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function datefmysql(tgl) {
        var tanggal=tgl;
        var elem = tanggal.split('-');
        var tahun = elem[0];
        var bulan = elem[1];
        var hari  = elem[2];
        return hari+'/'+bulan+'/'+tahun;
}
function Angka(obj) {
        a = obj.value;
        b = a.replace(/[^\d]/g,'');
        c = '';
        lengthchar = b.length;
        j = 0;
        for (i = lengthchar; i > 0; i--) {
                j = j + 1;
                if (((j % 3) == 1) && (j != 1)) {
                        c = b.substr(i-1,1) + '' + c;
                } else {
                        c = b.substr(i-1,1) + c;
                }
        }
        obj.value = c;
}

function FormNum(obj) {
        a = obj.value;
        b = a.replace(/[^\d]/g,'');
        c = '';
        lengthchar = b.length;
        j = 0;
        for (i = lengthchar; i > 0; i--) {
                j = j + 1;
                if (((j % 3) == 1) && (j != 1)) {
                        c = b.substr(i-1,1) + '.' + c;
                } else {
                        c = b.substr(i-1,1) + c;
                }
        }
        obj.value = c;
}

function numberToCurrency(a){
       a=a.toString();       
        var b = a.replace(/[^\d\,]/g,'');
		var dump = b.split(',');
        var c = '';
        var lengthchar = dump[0].length;
        var j = 0;
        for (var i = lengthchar; i > 0; i--) {
                j = j + 1;
                if (((j % 3) == 1) && (j != 1)) {
                        c = dump[0].substr(i-1,1) + '.' + c;
                } else {
                        c = dump[0].substr(i-1,1) + c;
                }
        }
		
		if(dump.length>1){
			if(dump[1].length>0){
				c += ','+dump[1];
			}else{
				c += ',';
			}
		}
    return c;
}

function currencyToNumber(a) {
    var b=a.toString();
    var c='';
    if(a!==''){
        c=b.replace(/\.+/g, '');
        return parseInt(c);
    } else {
        return '';
    }
}