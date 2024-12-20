import React, { useState, useEffect } from 'react';

const MahasiswaForm = ({ onSubmit, editData }) => {
    const [form, setForm] = useState({
        nim: '',
        nama: '',
        alamat: '',
        tanggal_lahir: '',
        jurusan: '',
    });

    useEffect(() => {
        if (editData) {
            setForm(editData); 
        } else {
            setForm({ nim: '', nama: '', alamat: '', tanggal_lahir: '', jurusan: '' });
        }
    }, [editData]);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setForm((prev) => ({ ...prev, [name]: value }));
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        onSubmit(form); 
    };

    return (
        <form onSubmit={handleSubmit} className="bg-light p-4 rounded shadow-sm">
            <h3 className="mb-4">{editData ? 'Update Mahasiswa' : 'Tambah Mahasiswa'}</h3>
            
            <div className="mb-3">
                <label htmlFor="nim" className="form-label">NIM</label>
                <input
                    type="text"
                    name="nim"
                    value={form.nim}
                    onChange={handleChange}
                    id="nim"
                    className="form-control"
                    required
                />
            </div>
            
            <div className="mb-3">
                <label htmlFor="nama" className="form-label">Nama</label>
                <input
                    type="text"
                    name="nama"
                    value={form.nama}
                    onChange={handleChange}
                    id="nama"
                    className="form-control"
                    required
                />
            </div>

            <div className="mb-3">
                <label htmlFor="alamat" className="form-label">Alamat</label>
                <input
                    type="text"
                    name="alamat"
                    value={form.alamat}
                    onChange={handleChange}
                    id="alamat"
                    className="form-control"
                    required
                />
            </div>

            <div className="mb-3">
                <label htmlFor="tanggal_lahir" className="form-label">Tanggal Lahir</label>
                <input
                    type="date"
                    name="tanggal_lahir"
                    value={form.tanggal_lahir}
                    onChange={handleChange}
                    id="tanggal_lahir"
                    className="form-control"
                    required
                />
            </div>

            <div className="mb-3">
                <label htmlFor="jurusan" className="form-label">Jurusan</label>
                <input
                    type="text"
                    name="jurusan"
                    value={form.jurusan}
                    onChange={handleChange}
                    id="jurusan"
                    className="form-control"
                    required
                />
            </div>

            <button type="submit" className="btn btn-primary w-100">
                {editData ? 'Update Mahasiswa' : 'Tambah Mahasiswa'}
            </button>
        </form>
    );
};

export default MahasiswaForm;
