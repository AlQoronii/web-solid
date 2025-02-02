import React from 'react';

const Features = () => {
  return (
    <section id="features" className="py-20 bg-gray-100">
      <div className="container mx-auto px-6">
        <h2 className="text-3xl font-bold text-center text-gray-800 mb-8">Our Features</h2>
        <div className="flex flex-wrap">
          <div className="w-full md:w-1/3 px-4 mb-8">
            <div className="bg-white rounded-lg shadow-lg p-6">
              <img src={`${process.env.PUBLIC_URL}/assets/images/library-books.jpg`} alt="Books" className="w-full h-48 object-cover rounded-lg mb-4" />
              <h3 className="text-xl font-bold mb-2">Extensive Collection</h3>
              <p className="text-gray-600">Access thousands of books, journals, and digital resources across various genres and subjects.</p>
            </div>
          </div>
          <div className="w-full md:w-1/3 px-4 mb-8">
            <div className="bg-white rounded-lg shadow-lg p-6">
              <img src={`${process.env.PUBLIC_URL}/assets/images/library-reading.jpg`} alt="Reading Area" className="w-full h-48 object-cover rounded-lg mb-4" />
              <h3 className="text-xl font-bold mb-2">Comfortable Reading Areas</h3>
              <p className="text-gray-600">Enjoy our comfortable and quiet reading areas designed to enhance your reading experience.</p>
            </div>
          </div>
          <div className="w-full md:w-1/3 px-4 mb-8">
            <div className="bg-white rounded-lg shadow-lg p-6">
              <img src={`${process.env.PUBLIC_URL}/assets/images/library-digital.png`} alt="Digital Resources" className="w-full h-48 object-cover rounded-lg mb-4" />
              <h3 className="text-xl font-bold mb-2">Digital Resources</h3>
              <p className="text-gray-600">Access a wide range of digital resources, including e-books, audiobooks, and online databases.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Features;