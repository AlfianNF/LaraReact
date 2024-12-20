import React, { useState, useEffect } from 'react';
import axios from 'axios';
import MahasiswaForm from './components/MahasiswaForm';
import MahasiswaList from './components/MahasiswaList';

const App = () => {
    const [mahasiswa, setMahasiswa] = useState([]);
    const [editData, setEditData] = useState(null); // Data yang akan diedit

    const apiURL = 'http://praktikum.test/api/mahasiswa';

    // Fetch data mahasiswa dari API
    const fetchMahasiswa = async () => {
        try {
            const response = await axios.get(apiURL);
            setMahasiswa(response.data.data || []); // Simpan data mahasiswa
        } catch (error) {
            console.error('Error fetching mahasiswa:', error);
        }
    };

    // Tambah atau update mahasiswa
    const saveMahasiswa = async (data) => {
        try {
            if (editData) {
                // Update mahasiswa menggunakan NIM
                await axios.put(`${apiURL}/${editData.nim}`, data);
            } else {
                // Create mahasiswa
                await axios.post(apiURL, data);
            }
            fetchMahasiswa(); // Refresh data
            setEditData(null); // Reset form
        } catch (error) {
            console.error('Error saving mahasiswa:', error);
        }
    };
    

    // Hapus mahasiswa
    const deleteMahasiswa = async (nim) => {
        try {
            // Hapus mahasiswa berdasarkan NIM
            await axios.delete(`${apiURL}/${nim}`);
            fetchMahasiswa(); // Refresh data
        } catch (error) {
            console.error('Error deleting mahasiswa:', error);
        }
    };

    // Ambil data mahasiswa untuk edit
    const handleEdit = (data) => {
        setEditData(data);
    };

    useEffect(() => {
        fetchMahasiswa();
    }, []);

    return (
        <div className="container mx-auto mt-4">
            <h1 className="text-2xl font-bold mb-4">CRUD Mahasiswa</h1>
            <MahasiswaForm onSubmit={saveMahasiswa} editData={editData} />
            <MahasiswaList
                mahasiswa={mahasiswa}
                onDelete={deleteMahasiswa}
                onEdit={handleEdit}
            />
        </div>
    );
};

export default App;
