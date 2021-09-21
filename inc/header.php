<section className="container mx-auto max-h-44 select-auto p-4" >
        <header className="container mx-auto py-3 print:hidden">
        <nav>
            <div className="flex justify-between items-center inline-block px-4">
                <Link href="/">
                <a className="group p-2 focus-within:text-primiaryshade outline-none focus:outline-none focus:ring-2 focus:ring-primaryshade focus:border-transparent focus-within:text-primaryshade rounded-md">
                    <div className="flex items-center flex-nowrap cursor-pointer">
                        <Logo strokeWidth="35" className="group-hover:text-primaryshade fill-current stroke-current w-10 md:w-12 xl:w-16"/>
                        <p className="font-bold text-md md:text-lg xl:text-xl ml-4 group-hover:text-primaryshade">Lasse Aakjær</p>
                    </div>
                </a>
                </Link>

                <ul className="hidden lg:flex">
                    <li className="group mr-4 text-xl p-4 cursor-pointer border-b-4 border-primary border-opacity-0 focus-within:border-opacity-100 hover:border-opacity-100 transition duration-200 ease-in-out">
                        <Link href="/">
                            <a className="outline-none group-hover:text-primaryshade focus:text-primaryshade">Home</a>
                        </Link>
                    </li>
                    <li className="group mr-4 text-xl p-4 cursor-pointer border-b-4 border-primary border-opacity-0 focus-within:border-opacity-100 hover:border-opacity-100 transition duration-200 ease-in-out">
                        <Link href="/cv">
                            <a className="outline-none group-hover:text-primaryshade focus:text-primaryshade">CV</a>
                        </Link>
                    </li>
                    <li className="group mr-4 text-xl p-4 cursor-pointer border-b-4 border-primary border-opacity-0 focus-within:border-opacity-100 hover:border-opacity-100 transition duration-200 ease-in-out">
                        <Link href="/contact">
                            <a className="outline-none group-hover:text-primaryshade focus:text-primaryshade">Contact</a>
                        </Link>
                    </li>
                    <li className="group mr-4 text-xl p-4 cursor-pointer border-b-4 border-primary border-opacity-0 focus-within:border-opacity-100 hover:border-opacity-100 transition duration-200 ease-in-out">
                        <Link href="/blog">
                            <a className="outline-none group-hover:text-primaryshade focus:text-primaryshade">Blog</a>
                        </Link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

