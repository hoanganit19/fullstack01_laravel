# Repository Design Pattern

Controller: Chứa Business Logic

=> UserRepository => UserRepositoryInterface: Tương ứng với User Model

=> BaseRepository => RepositoryInterface: Core (Có các phương thức mà model nào cũng dùng)

# Services

Controller => Services => Repositories => Model
