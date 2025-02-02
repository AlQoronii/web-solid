
import React from 'react';




export default function Hero() {
  return (

    <>

    <section style={{ backgroundImage: 'url(/assets/images/background-mountain.jpg)', backgroundPosition: 'center', backgroundSize: 'cover' }} className="py-20">

        <div className="container mx-auto pt-[350px] px-6 flex justify-between items-center h-[400px] bg-cover bg-center">

            <div className="text-left">

                <h2 className="text-4xl font-bold mb-2 text-white-snow">Welcome to Our Library</h2>

                <h3 className="text-2xl mb-8 text-gray-100">Explore a World of Knowledge</h3>

                <a href="#features" className="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">Start Exploring</a>

            </div>

            {/* <div className="flex space-x-4">

                {books && books.map((book) => (

                    <img key={book.id} src={`/storage/books/images/${book.book_image}`} alt={book.book_title} className="w-24 h-32 object-cover rounded-lg" />

                ))}

            </div> */}

        </div>

    </section>

    </>

  );




}
