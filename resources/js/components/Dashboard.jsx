import React, { useState, useEffect } from 'react';
import { createRoot } from 'react-dom/client';

const Dashboard = () => {
    const [permohonan, setPermohonan] = useState([]);
    const [loading, setLoading] = useState(true);
    const [user, setUser] = useState({ name: 'Nelayan' });

    useEffect(() => {
        // Simulate API call to get data
        setTimeout(() => {
            setPermohonan([
                {
                    id: 1,
                    nama_kapal: 'KM. Maju Jaya',
                    jenis_usaha: 'Perikanan Tangkap',
                    status: 'menunggu_operator',
                    created_at: new Date()
                }
            ]);
            setLoading(false);
        }, 1000);
    }, []);

    const getStatusBadge = (status) => {
        const statusConfig = {
            'menunggu_operator': {
                label: 'Menunggu Verifikasi',
                color: 'bg-yellow-100 text-yellow-800',
                icon: '⏳'
            },
            'dipublikasikan': {
                label: 'Dipublikasikan',
                color: 'bg-green-100 text-green-800',
                icon: '✅'
            },
            'ditolak_operator': {
                label: 'Ditolak',
                color: 'bg-red-100 text-red-800',
                icon: '❌'
            }
        };

        const config = statusConfig[status] || { label: status, color: 'bg-gray-100 text-gray-800', icon: '❓' };

        return (
            <span className={`inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${config.color}`}>
                <span className="mr-1">{config.icon}</span>
                {config.label}
            </span>
        );
    };

    const StatCard = ({ title, value, color, icon, subtitle }) => (
        <div className={`bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden group ${color}`}>
            <div className="p-6">
                <div className="flex items-center justify-between">
                    <div>
                        <p className="text-sm font-semibold text-gray-600 uppercase tracking-wide mb-1">{title}</p>
                        <p className="text-3xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">{value}</p>
                        {subtitle && <p className="text-xs text-gray-500 mt-1">{subtitle}</p>}
                    </div>
                    <div className={`p-3 rounded-xl shadow-lg ${color.replace('group-hover:', '')}`}>
                        {icon}
                    </div>
                </div>
            </div>
        </div>
    );

    if (loading) {
        return (
            <div className="min-h-screen bg-gray-50 flex items-center justify-center">
                <div className="text-center">
                    <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
                    <p className="mt-4 text-gray-600">Memuat dashboard...</p>
                </div>
            </div>
        );
    }

    return (
        <div className="min-h-screen bg-gray-50">
            {/* Hero Section */}
            <div className="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-800 rounded-2xl shadow-2xl overflow-hidden mx-4 mt-8">
                <div className="relative">
                    <div className="absolute inset-0 bg-black bg-opacity-10">
                        <div className="absolute inset-0 opacity-10" style={{
                            backgroundImage: `url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")`
                        }}></div>
                    </div>

                    <div className="relative px-8 py-12 md:px-12 md:py-16">
                        <div className="flex flex-col md:flex-row items-center justify-between">
                            <div className="text-white mb-8 md:mb-0 md:mr-8">
                                <div className="flex items-center mb-4">
                                    <div className="bg-white bg-opacity-20 p-3 rounded-full mr-4">
                                        <svg className="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h1 className="text-3xl md:text-4xl font-bold">Selamat Datang!</h1>
                                        <p className="text-blue-100 text-lg">{user.name}</p>
                                    </div>
                                </div>
                                <p className="text-blue-100 text-lg leading-relaxed max-w-2xl">
                                    Kelola permohonan rekomendasi BBM khusus penugasan Anda dengan mudah. Sistem ini dirancang khusus untuk membantu nelayan mendapatkan rekomendasi resmi dari Dinas Perikanan Daerah.
                                </p>
                            </div>

                            <div className="flex-shrink-0">
                                <div className="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 border border-white border-opacity-20">
                                    <div className="text-center">
                                        <div className="text-4xl font-bold text-white mb-2">{permohonan.length}</div>
                                        <div className="text-blue-100 text-sm uppercase tracking-wide">Total Permohonan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {/* Stats Cards */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mx-4 mt-8">
                <StatCard
                    title="Total Permohonan"
                    value={permohonan.length}
                    color="group-hover:text-blue-600"
                    subtitle="Aktif"
                    icon={
                        <svg className="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    }
                />
                <StatCard
                    title="Menunggu Verifikasi"
                    value={permohonan.filter(p => p.status === 'menunggu_operator').length}
                    color="group-hover:text-yellow-600"
                    subtitle="Perlu Perhatian"
                    icon={
                        <svg className="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    }
                />
                <StatCard
                    title="Dipublikasikan"
                    value={permohonan.filter(p => p.status === 'dipublikasikan').length}
                    color="group-hover:text-green-600"
                    subtitle="Berhasil"
                    icon={
                        <svg className="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    }
                />
                <StatCard
                    title="Ditolak"
                    value={permohonan.filter(p => p.status.includes('ditolak')).length}
                    color="group-hover:text-red-600"
                    subtitle="Perlu Revisi"
                    icon={
                        <svg className="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    }
                />
            </div>

            {/* Quick Actions */}
            <div className="grid grid-cols-1 lg:grid-cols-3 gap-6 mx-4 mt-8">
                {/* Main Action Card */}
                <div className="lg:col-span-2 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100">
                    <div className="flex items-center justify-between">
                        <div className="flex-1">
                            <h3 className="text-2xl font-bold text-gray-900 mb-2">Ajukan Permohonan Baru</h3>
                            <p className="text-gray-600 mb-6 leading-relaxed">
                                Mulai proses pengajuan rekomendasi BBM khusus penugasan untuk kapal Anda. Pastikan semua dokumen lengkap untuk mempercepat proses verifikasi.
                            </p>
                            <div className="flex flex-wrap gap-3 mb-6">
                                {['Proses Cepat', 'Aman & Terpercaya', '24/7 Support'].map((badge, index) => (
                                    <span key={index} className="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                                        <svg className="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {badge}
                                    </span>
                                ))}
                            </div>
                            <button className="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg className="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Mulai Pengajuan Sekarang
                            </button>
                        </div>
                        <div className="hidden lg:block ml-8">
                            <div className="relative">
                                <div className="w-32 h-32 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl flex items-center justify-center shadow-2xl">
                                    <svg className="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div className="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg className="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Info Panel */}
                <div className="space-y-4">
                    {/* Status Info */}
                    <div className="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                        <h4 className="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg className="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Status Permohonan
                        </h4>
                        <div className="space-y-3">
                            {[
                                { label: 'Menunggu Verifikasi', count: permohonan.filter(p => p.status === 'menunggu_operator').length, color: 'bg-yellow-100 text-yellow-800' },
                                { label: 'Dipublikasikan', count: permohonan.filter(p => p.status === 'dipublikasikan').length, color: 'bg-green-100 text-green-800' },
                                { label: 'Ditolak', count: permohonan.filter(p => p.status.includes('ditolak')).length, color: 'bg-red-100 text-red-800' }
                            ].map((item, index) => (
                                <div key={index} className="flex items-center justify-between">
                                    <span className="text-sm text-gray-600">{item.label}</span>
                                    <span className={`inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${item.color}`}>
                                        {item.count}
                                    </span>
                                </div>
                            ))}
                        </div>
                    </div>

                    {/* Quick Help */}
                    <div className="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-100">
                        <h4 className="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg className="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Butuh Bantuan?
                        </h4>
                        <p className="text-sm text-gray-600 mb-4">
                            Jika Anda mengalami kesulitan atau memiliki pertanyaan, hubungi tim support kami.
                        </p>
                        <button className="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition duration-150 ease-in-out">
                            <svg className="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Hubungi Support
                        </button>
                    </div>
                </div>
            </div>

            {/* Daftar Permohonan */}
            <div className="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 mx-4 mt-8 mb-8">
                <div className="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <h4 className="text-lg font-semibold text-gray-900 flex items-center">
                        <svg className="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Daftar Permohonan Anda
                    </h4>
                </div>
                <div className="p-6">
                    {permohonan.length > 0 ? (
                        <div className="overflow-x-auto">
                            <table className="min-w-full divide-y divide-gray-200">
                                <thead className="bg-gray-50">
                                    <tr>
                                        {['Nama Kapal', 'Jenis Usaha', 'Status', 'Tanggal', 'Aksi'].map((header, index) => (
                                            <th key={index} className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {header}
                                            </th>
                                        ))}
                                    </tr>
                                </thead>
                                <tbody className="bg-white divide-y divide-gray-200">
                                    {permohonan.map((item, index) => (
                                        <tr key={index} className="hover:bg-gray-50 transition-colors duration-200">
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                <div className="text-sm font-medium text-gray-900">{item.nama_kapal}</div>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                <div className="text-sm text-gray-500">{item.jenis_usaha}</div>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                {getStatusBadge(item.status)}
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {new Date(item.created_at).toLocaleDateString('id-ID')}
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <button className="text-blue-600 hover:text-blue-900 transition-colors duration-200">
                                                    Lihat Detail
                                                </button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    ) : (
                        <div className="text-center py-12">
                            <svg className="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 className="mt-4 text-lg font-medium text-gray-900">Belum ada permohonan</h3>
                            <p className="mt-2 text-sm text-gray-500">Mulai ajukan permohonan rekomendasi BBM Anda untuk mendapatkan surat rekomendasi dari Dinas Perikanan.</p>
                            <div className="mt-6">
                                <button className="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <svg className="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Ajukan Permohonan Pertama
                                </button>
                            </div>
                        </div>
                    )}
                </div>
            </div>
        </div>
    );
};

// Mount React app
const container = document.getElementById('react-dashboard');
if (container) {
    const root = createRoot(container);
    root.render(<Dashboard />);
}

export default Dashboard;
