{
  inputs = {
    parts = {
      url = "github:hercules-ci/flake-parts";
      inputs.nixpkgs-lib.follows = "nixpkgs";
    };
    devshell.url = "github:numtide/devshell";
  };

  outputs = {
    self,
    nixpkgs,
    parts,
    ...
  } @ inputs: let
    name = "blog_api";
    version = 0.1;
  in
    parts.lib.mkFlake {inherit inputs;} {
      systems = ["aarch64-darwin" "x86_64-darwin" "x86_64-linux"];

      perSystem = {
        pkgs,
        system,
        ...
      }: {
        _module.args.pkgs = import self.inputs.nixpkgs {
          inherit system;
          overlays = [
            self.inputs.devshell.overlays.default
          ];
        };

        devShells.default = pkgs.devshell.mkShell {
          packages = with pkgs; [
            php80Packages.composer
            nodejs
          ];
        };

        formatter = pkgs.alejandra;
      };
    };
}
