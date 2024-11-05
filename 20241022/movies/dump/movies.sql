DROP TABLE movies IF EXiSTS;

CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uuid CHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    production_studio VARCHAR(255) NOT NULL,
    release_year YEAR NOT NULL,
    genres VARCHAR(255) NOT NULL
);

INSERT INTO movies (uuid, title, production_studio, release_year, genres)
VALUES
('550e8400-e29b-41d4-a716-446655440000', 'The Godfather', 'Paramount Pictures', 1972, 'Crime, Drama'),
('123e4567-e89b-12d3-a456-426614174000', 'The Dark Knight', 'Warner Bros.', 2008, 'Action, Crime, Drama'),
('e123e4567-e89b-12d3-a456-426614170001', 'Inception', 'Warner Bros.', 2010, 'Action, Sci-Fi, Thriller'),
('0f8fad5b-d9cb-469f-a165-708677289000', 'Avatar: The Way of Water', '20th Century Studios', 2022, 'Action, Adventure, Sci-Fi'),
('987fbc9c-4bed-452d-8d1c-efbaebd5a12a', 'Pulp Fiction', 'Miramax Films', 1994, 'Crime, Drama, Thriller'),
('0d9e2b2a-b1d2-41d2-a7ab-09a9d87f7683', 'Schindlers List', 'Universal Pictures', 1993, 'Biography, Drama, History'),
('d5f6fb8f-9e13-4fc2-85cc-c3c6487f0d61', 'The Shawshank Redemption', 'Castle Rock Entertainment', 1994, 'Drama'),
('3cbfe2ea-1a2e-49a9-b8f7-4cfef30357de', 'Forrest Gump', 'Paramount Pictures', 1994, 'Drama, Romance'),
('8e99d7c1-d751-4637-b617-72b5d331f158', 'Fight Club', '20th Century Fox', 1999, 'Drama'),
('20b48755-6403-4b12-bb08-2efc3e51f3ae', 'The Matrix', 'Warner Bros.', 1999, 'Action, Sci-Fi'),
('bdcb9c63-964e-4ab7-898b-2b5827f16a71', 'Interstellar', 'Paramount Pictures', 2014, 'Adventure, Drama, Sci-Fi'),
('39d7fd09-453b-478d-9a34-2126e9d15a89', 'Gladiator', 'DreamWorks Pictures', 2000, 'Action, Adventure, Drama'),
('ba48c57e-d8b8-49f2-a55e-4504c7f9d10a', 'The Lord of the Rings: The Fellowship of the Ring', 'New Line Cinema', 2001, 'Adventure, Drama, Fantasy'),
('cfe7c9e8-7872-4208-9864-37e19d3e635f', 'The Lord of the Rings: The Return of the King', 'New Line Cinema', 2003, 'Adventure, Drama, Fantasy'),
('c374b7d1-30e9-4c08-b8c6-109f5317a5b4', 'The Lord of the Rings: The Two Towers', 'New Line Cinema', 2002, 'Adventure, Drama, Fantasy'),
('2ec65f97-7cf3-495a-923d-d195f1bc60c1', 'Star Wars: Episode V - The Empire Strikes Back', 'Lucasfilm', 1980, 'Action, Adventure, Fantasy'),
('663bfaec-6115-42fb-9f2f-13e4f9f3cc8a', 'Star Wars: Episode IV - A New Hope', 'Lucasfilm', 1977, 'Action, Adventure, Fantasy'),
('87efc1e2-6e13-4b95-83f1-e8bcbeb1984b', 'Star Wars: Episode VI - Return of the Jedi', 'Lucasfilm', 1983, 'Action, Adventure, Fantasy'),
('2c4c8ab1-634a-450e-80fa-c34fe09c8a92', 'Avengers: Endgame', 'Marvel Studios', 2019, 'Action, Adventure, Drama'),
('63d8f542-cc9e-4c4b-8d57-73ad03dcbf5b', 'Avengers: Infinity War', 'Marvel Studios', 2018, 'Action, Adventure, Sci-Fi'),
('20b74667-7dd1-47fc-a07c-8e67d4b923f2', 'Jurassic Park', 'Universal Pictures', 1993, 'Adventure, Sci-Fi, Thriller'),
('c3d6885b-1285-44a9-aad4-1a771e7c5d96', 'Titanic', '20th Century Fox', 1997, 'Drama, Romance'),
('2d49dff8-04c8-4b3d-970b-c8b90f0c5570', 'Back to the Future', 'Universal Pictures', 1985, 'Adventure, Comedy, Sci-Fi'),
('a67b9409-8c3e-444e-b2f0-25b24e1ff9af', 'Saving Private Ryan', 'DreamWorks Pictures', 1998, 'Drama, War'),
('6f09b73c-16a7-4f80-89c9-4e9d0d865ac3', 'The Silence of the Lambs', 'Orion Pictures', 1991, 'Crime, Drama, Thriller'),
('7a5b4174-2687-4946-963f-5f07c35e65db', 'Goodfellas', 'Warner Bros.', 1990, 'Biography, Crime, Drama'),
('128fc4ae-5e99-4d82-a1ae-853eb8ae6a48', 'The Usual Suspects', 'PolyGram Filmed Entertainment', 1995, 'Crime, Drama, Mystery'),
('5692d23a-3ae7-4927-bbf0-faf65dbe4f21', 'The Lion King', 'Walt Disney Pictures', 1994, 'Animation, Adventure, Drama'),
('9ecbe7cf-4232-474f-927f-b2c0bc1088da', 'Toy Story', 'Pixar Animation Studios', 1995, 'Animation, Adventure, Comedy'),
('08d152d2-bab9-4a4b-b63f-55dcd432de73', 'Coco', 'Pixar Animation Studios', 2017, 'Animation, Adventure, Comedy'),
('2c35d995-6620-4b7f-8fc7-ec4b19b12363', 'Finding Nemo', 'Pixar Animation Studios', 2003, 'Animation, Adventure, Comedy'),
('6cfb6c07-b2a1-4fbc-8d9c-43103fa1c022', 'Spider-Man: Into the Spider-Verse', 'Sony Pictures Animation', 2018, 'Animation, Action, Adventure'),
('9ef1e2b8-b615-4950-8402-b7ed547b4d8f', 'Frozen', 'Walt Disney Animation Studios', 2013, 'Animation, Adventure, Comedy'),
('1e59e23e-8eb4-42b4-9cf5-d9f02c6ed7da', 'Zootopia', 'Walt Disney Animation Studios', 2016, 'Animation, Adventure, Comedy'),
('f31967c4-e98f-4c88-836d-cf942e47a2ef', 'Moana', 'Walt Disney Animation Studios', 2016, 'Animation, Adventure, Comedy'),
('f53db8f6-e290-4b0e-88cc-0cb9e1bfb1a2', 'The Incredibles', 'Pixar Animation Studios', 2004, 'Animation, Action, Adventure'),
('b64054fb-0e5d-45d2-b5f1-f3b0f317dc76', 'Up', 'Pixar Animation Studios', 2009, 'Animation, Adventure, Comedy'),
('2e8d4a75-9f77-4c80-8f6d-40fbb0d64587', 'WALL·E', 'Pixar Animation Studios', 2008, 'Animation, Adventure, Family'),
('7d69f631-819f-4e4e-93c4-7c1cce2b03cf', 'Shrek', 'DreamWorks Animation', 2001, 'Animation, Adventure, Comedy'),
('c80a4891-9b63-4032-ae98-bd5f8342e7f6', 'Shrek 2', 'DreamWorks Animation', 2004, 'Animation, Adventure, Comedy'),
('0d9ff3a8-b9b8-4a97-95de-80c75d44ea3f', 'Kung Fu Panda', 'DreamWorks Animation', 2008, 'Animation, Action, Adventure'),
('adbbda52-3d34-49ef-bff5-5f60dbbff517', 'Madagascar', 'DreamWorks Animation', 2005, 'Animation, Adventure, Comedy'),
('00d3c1eb-81b3-4c2d-836b-63aee5752238', 'How to Train Your Dragon', 'DreamWorks Animation', 2010, 'Animation, Action, Adventure'),
('2224f5b1-058f-4b7d-89be-bef72da17cda', 'The Lion King (2019)', 'Walt Disney Pictures', 2019, 'Animation, Adventure, Drama'),
('42c19576-0a9b-4fb2-815f-d7c5166884a1', 'Aladdin (2019)', 'Walt Disney Pictures', 2019, 'Adventure, Comedy, Family'),
('2e3269d6-2515-4b12-9b08-e4f16ecf33d9', 'Beauty and the Beast (2017)', 'Walt Disney Pictures', 2017, 'Family, Fantasy, Musical'),
('1e859f52-b720-4e25-8ef7-f4ae6f942332', 'Mulan (2020)', 'Walt Disney Pictures', 2020, 'Action, Adventure, Drama'),
('a90527b3-6b3a-4111-b6f1-64bcdfeadac7', 'Raya and the Last Dragon', 'Walt Disney Animation Studios', 2021, 'Animation, Action, Adventure'),
('67e68d92-7081-4f67-9f1a-e12e8306226b', 'Encanto', 'Walt Disney Animation Studios', 2021, 'Animation, Comedy, Drama'),
('b2cf0426-037e-4341-badf-eae9b4e8eddb', 'Soul', 'Pixar Animation Studios', 2020, 'Animation, Adventure, Comedy'),
('5c36bfe8-d51b-4fd6-91d1-6e4b26c6077a', 'Luca', 'Pixar Animation Studios', 2021, 'Animation, Adventure, Comedy'),
('8aeef86a-9bff-4e95-867f-f06512a80a4e', 'Monsters, Inc.', 'Pixar Animation Studios', 2001, 'Animation, Adventure, Comedy'),
('a8328b0c-7a29-4b4d-b987-1f2f48248c56', 'The Social Network', 'Columbia Pictures', 2010, 'Biography, Drama'),
('0c0e5185-4882-497e-b9ae-69de01df0283', 'A Beautiful Mind', 'Universal Pictures', 2001, 'Biography, Drama'),
('8b0de540-7e71-4bdb-b27c-d73c90b9f8d7', 'La La Land', 'Summit Entertainment', 2016, 'Comedy, Drama, Music'),
('86b2b88d-36d4-4b34-bbeb-648b7a07369f', 'Whiplash', 'Sony Pictures Classics', 2014, 'Drama, Music'),
('753647cc-51ab-4015-88ea-19d3f38b54b5', 'The Pursuit of Happyness', 'Columbia Pictures', 2006, 'Biography, Drama'),
('23c88231-82ae-4dc4-a0d1-2560da9613a0', 'The Revenant', '20th Century Fox', 2015, 'Action, Adventure, Drama'),
('934eddf3-ccf5-4a2c-b74a-3ae7429d16cf', 'The Wolf of Wall Street', 'Paramount Pictures', 2013, 'Biography, Comedy, Crime'),
('7d65c347-1251-488a-b364-b7da2a0496c2', 'Django Unchained', 'Columbia Pictures', 2012, 'Drama, Western'),
('d7809a2b-24f6-4b19-9e2f-df2ff19b81c4', 'Once Upon a Time... in Hollywood', 'Columbia Pictures', 2019, 'Comedy, Drama'),
('e6f3df78-9adf-4c34-a96f-7bb0f4373b1c', 'Shutter Island', 'Paramount Pictures', 2010, 'Mystery, Thriller'),
('9fa2b47d-3e0b-43c1-8b6b-c6cb9b69a42f', 'Se7en', 'New Line Cinema', 1995, 'Crime, Drama, Mystery'),
('12b0d142-0198-48b5-bfa7-14fcf6ae2f58', 'Gone Girl', '20th Century Fox', 2014, 'Drama, Mystery, Thriller'),
('4c541fb8-fb17-43b7-888e-4b0a9f927f2f', 'The Big Short', 'Paramount Pictures', 2015, 'Biography, Comedy, Drama'),
('63a4e38d-11b3-44e3-9aa3-56c6c5fc27b9', 'Blade Runner 2049', 'Warner Bros.', 2017, 'Action, Drama, Sci-Fi'),
('57a7e120-2b47-4bda-b4ff-295ebd8f6a5a', 'Mad Max: Fury Road', 'Warner Bros.', 2015, 'Action, Adventure, Sci-Fi'),
('2920f73a-507d-4c2a-b9a2-3673b7a062d2', 'The Martian', '20th Century Fox', 2015, 'Adventure, Drama, Sci-Fi'),
('e3da24e5-abb1-49b2-941a-6f5b2fd73df2', 'Gravity', 'Warner Bros.', 2013, 'Drama, Sci-Fi, Thriller'),
('db07121c-c80a-4ba8-85fd-08f7c63fc61d', 'Arrival', 'Paramount Pictures', 2016, 'Drama, Mystery, Sci-Fi'),
('8da90bb9-637a-42b5-bb5e-d6b02f5059d6', 'Her', 'Warner Bros.', 2013, 'Drama, Romance, Sci-Fi'),
('54e8f926-4f5e-4d56-8b7a-b2368f908ea7', 'Ex Machina', 'A24', 2014, 'Drama, Sci-Fi, Thriller'),
('d324f74a-08da-41ea-b203-d220a80cdbb7', 'Black Swan', 'Fox Searchlight Pictures', 2010, 'Drama, Thriller'),
('49503c41-e23f-4c96-9c75-f592bb30e21e', 'The Shape of Water', 'Fox Searchlight Pictures', 2017, 'Drama, Fantasy, Romance'),
('0e2e5a9a-2174-4c6e-b168-5b4c7f7925a5', 'Parasite', 'CJ Entertainment', 2019, 'Comedy, Drama, Thriller'),
('55b9e759-caae-4312-b8a9-bfb144ff7487', 'Jojo Rabbit', 'Fox Searchlight Pictures', 2019, 'Comedy, Drama, War'),
('7836d040-b2f9-499d-8dbf-e8191a02d412', '1917', 'Universal Pictures', 2019, 'Drama, War'),
('aa0f4375-b3a4-462e-bb23-784f3f38dd8b', 'The Irishman', 'Netflix', 2019, 'Biography, Crime, Drama'),
('bba4cfc2-3b87-4f65-94ea-2b3cde69d82e', 'Marriage Story', 'Netflix', 2019, 'Comedy, Drama, Romance'),
('3c9e5d6f-933b-43b7-b1a6-7027e07bc92f', 'Birdman', 'Fox Searchlight Pictures', 2014, 'Comedy, Drama'),
('cfbff79c-f2b2-4bde-a9d7-d33a3e43263b', '12 Years a Slave', 'Fox Searchlight Pictures', 2013, 'Biography, Drama, History'),
('c2916454-05e5-4b6d-b79a-2c28e66b5e9f', 'Spotlight', 'Open Road Films', 2015, 'Biography, Crime, Drama'),
('25c3b803-f47d-4bc2-ace1-7df3e59b96bc', 'Room', 'A24', 2015, 'Drama, Thriller'),
('5a1b18ae-d87f-4697-83e7-5b110c9f5da0', 'The Grand Budapest Hotel', 'Fox Searchlight Pictures', 2014, 'Adventure, Comedy, Crime'),
('5041b8eb-8d56-497b-9334-b9d64b08b44c', 'Life of Pi', '20th Century Fox', 2012, 'Adventure, Drama, Fantasy'),
('da2f9a34-f59a-46fb-9ff5-c3d791054ae3', 'Slumdog Millionaire', 'Fox Searchlight Pictures', 2008, 'Drama, Romance'),
('88a74d36-2e92-4049-9ae0-fffe563b6595', 'The Kings Speech', 'The Weinstein Company', 2010, 'Biography, Drama, History'),
('60a0a39d-881f-404d-b576-c35bcd2f72f3', 'The Imitation Game', 'The Weinstein Company', 2014, 'Biography, Drama, Thriller'),
('1f43429b-2f36-46ae-8419-e19ba5f55c3b', 'Argo', 'Warner Bros.', 2012, 'Biography, Drama, Thriller'),
('eb07f7e3-64da-45db-b9a2-2ccf5f3d73e4', 'No Country for Old Men', 'Paramount Vantage', 2007, 'Crime, Drama, Thriller'),
('3a1ac543-e28a-4054-867a-b44e9a23e6a3', 'There Will Be Blood', 'Paramount Vantage', 2007, 'Drama'),
('4d9e9377-f34a-4c11-8570-fec6bb58f3e6', 'A Star Is Born', 'Warner Bros.', 2018, 'Drama, Music, Romance'),
('f9cdddb2-bec3-401b-b8f2-c4b0145dd01f', 'Joker', 'Warner Bros.', 2019, 'Crime, Drama, Thriller'),
('5ab85cf3-9294-438a-8754-e94c5c06d211', 'Uncut Gems', 'A24', 2019, 'Crime, Drama, Thriller'),
('330f2173-7045-45b5-9ab9-8ed62ab62233', 'The Lighthouse', 'A24', 2019, 'Drama, Fantasy, Horror'),
('d8fae498-0c53-45c9-bfbb-c7a06cf63158', 'The Farewell', 'A24', 2019, 'Comedy, Drama'),
('7556abdf-c1b5-42f4-b70f-0c72b474146a', 'Lady Bird', 'A24', 2017, 'Comedy, Drama'),
('7f679171-9b22-4b6a-8a9e-d9e2a6949736', 'Moonlight', 'A24', 2016, 'Drama'),
('4415b73e-958f-4fd3-89a9-e9c56f7df5be', 'Room', 'A24', 2015, 'Drama, Thriller'),
('063ce0eb-e76f-4cc1-b5b2-5a5704dd7dcf', 'Eighth Grade', 'A24', 2018, 'Comedy, Drama');