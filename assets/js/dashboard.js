window.onload = () => {
    // const ipnFileElement = document.querySelector('#id')
    const label_img = Array.from(document.querySelectorAll('.label-img'));
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
    const input_img = Array.from(document.querySelectorAll('.input-img'));


    input_img.forEach((inp) => {
        inp.onchange = (e) => {
            const files = e.target.files;
            const file = files[0];
            const fileType = file['type'];

            if (!validImageTypes.includes(fileType)) {
                alert('Hãy chọn ảnh dùm!');
                return
            }
            let id_inp = inp.id;
            let numb = id_inp.slice(id_inp.indexOf('-') + 1);

            let label = document.getElementById(`label-${numb}`);
            const fileReader = new FileReader()
            fileReader.readAsDataURL(file)

            fileReader.onload = function () {
                const url = fileReader.result
                label.innerHTML = `<img src="${url}" alt="${file.name}" class="preview-img" />`
            }

            e.stopPropagation();
        }
    })
}

const textArea = Array.from(document.querySelectorAll('textarea'));
textArea.forEach((e) => {
    e.value = e.value.trim();
})

const imgInsert = document.querySelector('#img-insert');
const labelInsert = document.querySelector('#label-insert');
const validImageTypes2 = ['image/gif', 'image/jpeg', 'image/png'];

imgInsert.onchange = (e) => {
    const files2 = e.target.files;
    const file2 = files2[0];
    const fileType2 = file2['type'];

    if (!validImageTypes2.includes(fileType2)) {
        alert('Hãy chọn ảnh dùm!');
        return
    }

    const fileReader = new FileReader()
    fileReader.readAsDataURL(file2)

    fileReader.onload = function () {
        const url = fileReader.result
        labelInsert.innerHTML = `<img src="${url}" alt="${file2.name}" class="preview-img" />`
    }

}


var modal = document.querySelector('#modal');
var insert = document.querySelector('#insert');
var form = document.querySelector('#form');



insert.onclick = () => {
    modal.style.display = 'flex';
}
modal.onclick = (e) => {
    modal.style.display = 'none';
}
form.onclick = (e) => {
    e.stopPropagation();

}



