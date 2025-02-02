import Background from '../../assets/background-mountain.jpg';

export default function Home() {
  return (
    <>
        <div>
        <section style={{  backgroundImage: `url(${Background})`, backgroundPosition: 'center', backgroundSize: 'cover' }} className="py-20">

          <div className="container mx-auto pt-56 px-6 flex justify-between items-center h-[400px] bg-cover bg-center">

              <div className="text-left">

                  <h2 className="text-4xl font-bold mb-2 text-white">Welcome to Our Library</h2>

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

        <section id="features" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Our Features</h2>
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        {/* <img src={process.env.PUBLIC_URL + '/library-books.jpg'} alt="Books" className="w-full h-48 object-cover rounded-lg mb-4"/> */}
                        <h3 class="text-xl font-bold mb-2">Extensive Collection</h3>
                        <p class="text-gray-600">Access thousands of books, journals, and digital resources across various genres and subjects.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        {/* <img src={process.env.PUBLIC_URL + '/library-books.jpg'} alt="Reading Area" className="w-full h-48 object-cover rounded-lg mb-4"/> */}
                        <h3 class="text-xl font-bold mb-2">Comfortable Reading Areas</h3>
                        <p class="text-gray-600">Enjoy our comfortable and quiet reading areas designed to enhance your reading experience.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        {/* <img src={process.env.PUBLIC_URL + '/library-books.jpg'} alt="Digital Resources" className="w-full h-48 object-cover rounded-lg mb-4"/> */}
                        <h3 class="text-xl font-bold mb-2">Digital Resources</h3>
                        <p class="text-gray-600">Access a wide range of digital resources, including e-books, audiobooks, and online databases.</p>
                    </div>
                </div>
            </div>
        </div>
        </section>
        </div>
    </>
  );
}
