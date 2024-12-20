import React from 'react';

const MahasiswaList = ({ mahasiswa, onDelete, onEdit }) => {
    return (
        <div className="container mt-4">
            <h2 className="h3 mb-4">Daftar Mahasiswa</h2>
            {mahasiswa.length > 0 ? (
                <table className="table table-bordered table-striped table-hover text-center">
                    <thead className="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {mahasiswa.map((mhs, index) => (
                            <tr key={mhs.nim}>
                                <td className="text-center">{index + 1}</td>
                                <td>{mhs.nim}</td>
                                <td>{mhs.nama}</td>
                                <td>{mhs.alamat}</td>
                                <td>{mhs.tanggal_lahir}</td>
                                <td>{mhs.jurusan}</td>
                                <td className="text-center">
                                    <button
                                        onClick={() => onEdit(mhs)}
                                        className="btn btn-warning btn-sm mx-1"
                                    >
                                        Edit
                                    </button>
                                    <button
                                        onClick={() => onDelete(mhs.nim)}
                                        className="btn btn-danger btn-sm mx-1"
                                    >
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            ) : (
                <p className="text-muted">Tidak ada data mahasiswa.</p>
            )}
        </div>
    );
};

export default MahasiswaList;
