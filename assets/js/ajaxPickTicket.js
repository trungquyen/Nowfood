// const ngaydat = document.querySelector('#ngaydat');
// const ngayketthuc = document.querySelector('#ngayketthuc');
const gia = document.getElementById('gia');
const soluong = document.getElementById('soluong');
const tongtien = document.getElementById('tongtien');
let gi = gia.value;
let sl = soluong.value;
tongtien.value = sl*gi;

let render = (sl) => {
    soluong.value = sl;
    tongtien.value = sl*gi;
}

let handlePlus = () => {
    sl++;
    render(sl);
}

let handleMinus = () => {
    if (sl>1)
        sl--;
    render(sl);
}

let myFunction = () => {
    tongtien.value = gi;
}

// ngaydat.onchange = () => {
//     const date1 = dayjs(ngaydat.value);
//     const date2 = dayjs(ngayketthuc.value);
//     let num = Math.abs(date2.diff(date1, 'day'));
//     chiphi.value = (20 * num);
//     if(num==0){
//         chiphi.value = 20;
//     }
//     if(date2.diff(date1,'day') <= 0){
//         ngaydat.value = ngayketthuc.value;
//     }
// }

// ngayketthuc.onchange = () => {
//     const date1 = dayjs(ngaydat.value);
//     const date2 = dayjs(ngayketthuc.value);
//     let num = Math.abs(date1.diff(date2, 'day'));
//     chiphi.value = (20 * num);
//     if(num==0){
//         chiphi.value = 20;
//     }

//     if(date2.diff(date1,'day') <= 0){
//         ngayketthuc.value = ngaydat.value;
//     }
// }



// window.onload = () => {
//     const name_hotel_ajax = document.querySelector('#name_hotel_ajax');
//     const phone_hotel_ajax = document.querySelector('#phone_hotel_ajax');
//     const place_hotel_ajax = document.querySelector('#place_hotel_ajax');
//     const soluongphong_hotel_ajax = document.querySelector('#soluongphong_hotel_ajax');
//     const nhahang_hotel_ajax = document.querySelector('#nhahang_hotel_ajax');
//     const phonghop_hotel_ajax = document.querySelector('#phonghop_hotel_ajax');
//     const damcuoi_hotel_ajax = document.querySelector('#damcuoi_hotel_ajax');
//     const massage_hotel_ajax = document.querySelector('#massage_hotel_ajax');
//     const mota_hotel_ajax = document.querySelector('#mota_hotel_ajax');
//     const trangthai_hotel_ajax = document.querySelector('#trangthai_hotel_ajax');
//     const img_hotel_ajax = document.querySelector('#img_hotel_ajax');
//     const id_hotel_ajax = document.querySelector('#id_hotel_ajax');

//     const btn_submit = document.querySelector('#btn-submit');
//     const form_ticket = document.querySelector('#form_ticket');
//     const name_hotel = document.querySelector('#name_hotel');


//     form_ticket.onsubmit = (e) => {
//         if (trangthai_hotel_ajax.textContent == 'Ngừng hoạt động') {
//             e.preventDefault();
//         }
//     }


//     name_hotel.onchange = () => {
//         var nameHotel = name_hotel.value;

//         $.post('../controller/getDataHotel.php', {
//             data: nameHotel
//         },
//             (data, status) => {
//                 var arr = JSON.parse(data);
//                 id_hotel_ajax.value = arr[0];
//                 name_hotel_ajax.textContent = arr[1];
//                 phone_hotel_ajax.textContent = arr[2];
//                 place_hotel_ajax.textContent = arr[3];
//                 soluongphong_hotel_ajax.textContent = arr[4];
//                 arr[5] == 1 ? nhahang_hotel_ajax.textContent = 'Có' : nhahang_hotel_ajax.textContent = 'Không';
//                 arr[6] == 1 ? phonghop_hotel_ajax.textContent = 'Có' : phonghop_hotel_ajax.textContent = 'Không';
//                 arr[7] == 1 ? damcuoi_hotel_ajax.textContent = 'Có' : damcuoi_hotel_ajax.textContent = 'Không';
//                 arr[8] == 1 ? massage_hotel_ajax.textContent = 'Có' : massage_hotel_ajax.textContent = 'Không';
//                 mota_hotel_ajax.textContent = arr[9];
//                 arr[10] == 1 ? trangthai_hotel_ajax.textContent = 'Đang hoạt động' : trangthai_hotel_ajax.textContent = 'Ngừng hoạt động';

//                 if (arr[11]) {
//                     img_hotel_ajax.src = `../uploads/${arr[11]}`;
//                 } else {
//                     img_hotel_ajax.src = '../assets/img/noimg.jpg';
//                 }
//             }
//         )
//     }



// }