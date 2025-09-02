import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';
import Layout from '@/layouts/app-layout';

interface News {
    id: number;
    title: string;
    content: string;
    summary?: string;
    image_url?: string;
    published_at: string;
}

interface NewsShowProps extends PageProps {
    news: News;
}

export default function NewsShow({ news }: NewsShowProps) {
    return (
        <Layout>
            <Head title={news.title} />
            
            <div className="container mx-auto px-4 py-8">
                <div className="max-w-4xl mx-auto">
                    <Link 
                        href={route('news.index')}
                        className="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6"
                    >
                        ← กลับไปหน้ารวมข่าว
                    </Link>
                    
                    <article className="bg-white rounded-lg shadow-md overflow-hidden">
                        {news.image_url && (
                            <img 
                                src={news.image_url} 
                                alt={news.title}
                                className="w-full h-64 md:h-96 object-cover"
                            />
                        )}
                        
                        <div className="p-8">
                            <h1 className="text-3xl font-bold text-gray-900 mb-4">
                                {news.title}
                            </h1>
                            
                            <div className="flex items-center text-gray-500 mb-6">
                                <span>
                                    {new Date(news.published_at).toLocaleDateString('th-TH', {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric',
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    })}
                                </span>
                            </div>
                            
                            {news.summary && (
                                <div className="bg-gray-50 p-4 rounded-lg mb-6">
                                    <p className="text-lg text-gray-700 font-medium">{news.summary}</p>
                                </div>
                            )}
                            
                            <div className="prose max-w-none">
                                <div 
                                    className="text-gray-800 leading-relaxed"
                                    dangerouslySetInnerHTML={{ __html: news.content }}
                                />
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </Layout>
    );
}
